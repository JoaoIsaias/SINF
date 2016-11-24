using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace FirstREST.Controllers
{
    public class ArtigoClienteController : ApiController
    {
        // POST /artigocliente/insertclassification/{id da categoria}
        public HttpResponseMessage GetByCategory(string param)
        {
            // TODODODODODODO

            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaArtigosDaCategoria(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }
    }
}
