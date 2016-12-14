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
            "Entidade": "ALCAD",
            "LinhasDoc": [
                {
                    "CodArtigo": "A0001",
                    "Quantidade": 2,
                    "PrecoUnitario": 100
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

        // GET /docvenda/getencomendascliente/{id do cliente}
        public HttpResponseMessage GetEncomendasCliente(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.GetEncomendasCliente(param));
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

        // GET /docvenda/getestadoencomenda/{numero de documento que vem com a encomenda}
        public HttpResponseMessage GetEstadoEncomenda(string param)
        {
            String state = Lib_Primavera.PriIntegration.GetEstadoEncomenda(param);

            HttpResponseMessage response;

            if (state == null)
            {
                response = Request.CreateResponse(HttpStatusCode.NotFound);
            }
            else
            {
                response = Request.CreateResponse(HttpStatusCode.OK, state);
            }

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }
    }
}
