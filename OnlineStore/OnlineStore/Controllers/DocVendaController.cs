using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using FirstREST.Lib_Primavera.Model;


namespace FirstREST.Controllers
{
    public class DocVendaController : ApiController
    {
        // POST /docvenda/insereencomenda
        /* Exemplo do body passado no post em json
        {
            "Entidade": "SOFRIO",
            "EmailEntidade": "lala@mail.com",
            "Serie": "2016",
            "LinhasDoc": [
                {
                    "CodArtigo": "A0001",
                    "DescArtigo": "Pentium D925 Dual Core",
                    "IdCabecDoc": "sd",
                    "Quantidade": 1,
                    "Unidade":1,
                    "Desconto":0,
                    "PrecoUnitario": 1000,
                    "TotalILiquido": 1000,
                    "TotalLiquido": 1000
                }
            ]
        }
         */
        public HttpResponseMessage InsereEncomenda(Lib_Primavera.Model.DocVenda doc)
        {
            Lib_Primavera.Model.RespostaErro erro = Lib_Primavera.PriIntegration.Encomendas_New(doc);

            bool succ;
            if(erro.Erro == 0){
                succ = true;
            }
            else
            {
                succ = false;
            }

            HttpResponseMessage response;

            if (succ)
                response = Request.CreateResponse(HttpStatusCode.Created);
            else
                response = Request.CreateResponse(HttpStatusCode.BadRequest);

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /docvenda/getartigosdaencomenda/{id da encomenda}
        public HttpResponseMessage GetArtigosDaEncomenda(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.GetArtigosDaEncomenda(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /docvenda/getencomendascliente/{id do cliente}
        public HttpResponseMessage GetEncomendasCliente(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.GET_Pedidos(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }


        public HttpResponseMessage Post(Lib_Primavera.Model.DocVenda dv)
        {
            Lib_Primavera.Model.RespostaErro erro = new Lib_Primavera.Model.RespostaErro();
            erro = Lib_Primavera.PriIntegration.Encomendas_New(dv);

            if (erro.Erro == 0)
            {
                var response = Request.CreateResponse(
                   HttpStatusCode.Created, dv.id);
                string uri = Url.Link("DefaultApi", new {DocId = dv.id });
                response.Headers.Location = new Uri(uri);
                return response;
            }

            else
            {
                return Request.CreateResponse(HttpStatusCode.BadRequest);
            }

        }


        public HttpResponseMessage Put(int id, Lib_Primavera.Model.Cliente cliente)
        {

            Lib_Primavera.Model.RespostaErro erro = new Lib_Primavera.Model.RespostaErro();

            try
            {
                erro = Lib_Primavera.PriIntegration.UpdCliente(cliente);
                if (erro.Erro == 0)
                {
                    return Request.CreateResponse(HttpStatusCode.OK, erro.Descricao);
                }
                else
                {
                    return Request.CreateResponse(HttpStatusCode.NotFound, erro.Descricao);
                }
            }

            catch (Exception exc)
            {
                return Request.CreateResponse(HttpStatusCode.BadRequest, erro.Descricao);
            }
        }



        public HttpResponseMessage Delete(string id)
        {


            Lib_Primavera.Model.RespostaErro erro = new Lib_Primavera.Model.RespostaErro();

            try
            {

                erro = Lib_Primavera.PriIntegration.DelCliente(id);

                if (erro.Erro == 0)
                {
                    return Request.CreateResponse(HttpStatusCode.OK, erro.Descricao);
                }
                else
                {
                    return Request.CreateResponse(HttpStatusCode.NotFound, erro.Descricao);
                }

            }

            catch (Exception exc)
            {
                return Request.CreateResponse(HttpStatusCode.BadRequest, erro.Descricao);

            }

        }

        //
        // GET: /Clientes/

        public IEnumerable<Lib_Primavera.Model.DocVenda> Get()
        {
            return Lib_Primavera.PriIntegration.Encomendas_List();
        }
    }
}
