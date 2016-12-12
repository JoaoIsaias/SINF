using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace FirstREST.Controllers
{
    public class ReviewController : ApiController
    {
        // POST /review/insertreview/
        /* Exemplo do body passado no post em json
            {
	            "CodArtigo" : "A0005",
	            "CodCliente" : "ALCAD",
	            "Classificacao" : 5,
	            "Comentario" : "Teste",
                "Data" : "2016-12-12 16:23:32"
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

        //POST /review/removereview/
        /* Exemplo do body passado no post em json
            {
	            "CodArtigo" : "A0005",
	            "CodCliente" : "ALCAD"
            }
         */
        public HttpResponseMessage RemoveReview(Lib_Primavera.Model.Review review)
        {
            bool succ = Lib_Primavera.PriIntegration.RemoveReview(review);

            HttpResponseMessage response;

            if (succ)
                response = Request.CreateResponse(HttpStatusCode.Created);
            else
                response = Request.CreateResponse(HttpStatusCode.BadRequest);

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /review/getartigoclassification/{id do artigo}
        public HttpResponseMessage GetArtigoClassification(string param)
        {
            double classificacao = Lib_Primavera.PriIntegration.GetClassificacao(param);

            HttpResponseMessage response;

            if (classificacao == -1)
            {
                response = Request.CreateResponse(HttpStatusCode.NotFound);
            }
            else
            {
                response = Request.CreateResponse(HttpStatusCode.OK, classificacao);
            }

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /review/getallartigoreviews/{id do artigo}
        public HttpResponseMessage GetAllArtigoReviews(string param)
        {
            HttpResponseMessage response = Request.CreateResponse(HttpStatusCode.OK, Lib_Primavera.PriIntegration.ListaReviews(param));
            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }
    }
}
