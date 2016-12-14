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
    public class ArtigoController : ApiController
    {
        // GET /artigo/getalllist
        public HttpResponseMessage GetAllList()
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaArtigos());
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/getbyid/{id do artigo}
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

        // POST /artigo/retrievebyidlist
         /* Exemplo do body passado no post em json
            {
	            "Artigos" : [
                    "B0001",
                    "B0002",
                    "B0003",
                    "B0004",
                    "B0005",
                    "B0006"
                ]
            }
         */
        public HttpResponseMessage RetrieveByIdList(Lib_Primavera.Model.ListaArtigos lista)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.GetByIdList(lista));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/getallcategories
        public HttpResponseMessage GetAllCategories()
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaCategorias());
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/get4randcategories
        public HttpResponseMessage Get4RandCategories()
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.Lista4CategoriasRand());
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/getcategorydescription/{id da categoria}
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

        // GET /artigo/getbycategory/{id da categoria}
        public HttpResponseMessage GetByCategory(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaArtigosDaCategoria(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/get4randbycategory/{id da categoria}
        public HttpResponseMessage Get4RandByCategory(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.Lista4ArtigosDaCategoriaRand(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/getallbrands
        public HttpResponseMessage GetAllBrands()
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaMarcas());
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/getbranddescription/{id da marca}
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

        // GET /artigo/getbybrand/{id da marca}
        public HttpResponseMessage GetByBrand(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaArtigosDaMarca(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/getstock/{id do artigo}
        public HttpResponseMessage GetStock(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaStock(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/getsearch/{querry de procura}
        public HttpResponseMessage GetSearch(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaSearch(param, ""));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /artigo/getsearch/{querry de procura}/{id da categoria ou marca}
        public HttpResponseMessage GetSearch(string param, string param2)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaSearch(param, param2));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }
    }
}