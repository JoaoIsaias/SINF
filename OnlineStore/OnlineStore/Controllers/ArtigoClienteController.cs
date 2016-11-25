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
        // POST /artigocliente/insertreview/
        /* Exemplo do body passado no post em json
            {
	            "CodArtigo" : "A0005",
	            "CodCliente" : "ALCAD",
	            "Classificacao" : 5,
	            "Comentario" : "Teste"
            }
         */
        public HttpResponseMessage InsertReview(Lib_Primavera.Model.Review review)
        {
            bool succ = Lib_Primavera.PriIntegration.InsereReview(review);

            HttpResponseMessage response;

            if (succ)
                response = Request.CreateResponse(HttpStatusCode.Created);
            else
                response = Request.CreateResponse(HttpStatusCode.BadRequest);

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // POST /artigocliente/removereview/
        /* Exemplo do body passado no post em json
            {
	            "CodArtigo" : "A0005",
	            "CodCliente" : "ALCAD"
            }
         */
        public HttpResponseMessage RemoveReview(string json)
        {
            // TODO
            
            HttpResponseMessage response = null;
            //response = Request.CreateResponse(HttpStatusCode.OK, );
            //response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }
    }
}
