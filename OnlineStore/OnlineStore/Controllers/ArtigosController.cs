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
    public class ArtigosController : ApiController
    {
        // GET /artigos/getalllist
        public HttpResponseMessage GetAllList()
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaArtigos());
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigos/getbyid/{id do artigo}
        public HttpResponseMessage GetByID(string param)
        {
            Lib_Primavera.Model.Artigo artigo = Lib_Primavera.PriIntegration.GetArtigo(param);

            HttpResponseMessage response;
            if (artigo == null)
            {
                response = Request.CreateResponse(HttpStatusCode.NotFound);
            }
            else
            {
                response = Request.CreateResponse(HttpStatusCode.OK, artigo);
            }

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigos/getallcategories
        public HttpResponseMessage GetAllCategories()
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaCategorias());
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigos/getcategorydescription/{id da categoria}
        public HttpResponseMessage GetCategoryDescription(string param)
        {
            String description = Lib_Primavera.PriIntegration.GetCategoryDescription(param);

            HttpResponseMessage response;

            if (description == null)
            {
                response = Request.CreateResponse(HttpStatusCode.NotFound);
            }
            else
            {
                response = Request.CreateResponse(HttpStatusCode.OK, description);
            }

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigos/getbycategory/{id da categoria}
        public HttpResponseMessage GetByCategory(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaArtigosDaCategoria(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigos/getallbrands
        public HttpResponseMessage GetAllBrands()
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaMarcas());
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigos/getbranddescription/{id da marca}
        public HttpResponseMessage GetBrandDescription(string param)
        {
            String description = Lib_Primavera.PriIntegration.GetBrandDescription(param);

            HttpResponseMessage response;

            if (description == null)
            {
                response = Request.CreateResponse(HttpStatusCode.NotFound);
            }
            else
            {
                response = Request.CreateResponse(HttpStatusCode.OK, description);
            }

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigos/getbybrand/{id da marca}
        public HttpResponseMessage GetByBrand(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaArtigosDaMarca(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigos/getstock/{id do artigo}
        public HttpResponseMessage GetStock(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaStock(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // Get do rating dado pelos clientes ao artigo
        // Select Avg(CDU_Classificacao) As ClassificacaoMedia From ArtigoCliente Where Artigo = 'A0005';
        // Preciso de inserir um valor na tabela ArtigoCliente para testar se o valor returnado é diferente de null
    }
}

