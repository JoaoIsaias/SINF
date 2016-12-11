using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace FirstREST.Controllers
{
    public class CarrinhoController : ApiController
    {
        // POST /carrinho/insertproduct/
        /* Exemplo do body passado no post em json
            {
                "id_Cliente" : "ALCAD",
	            "id_Artigo" : "A0005",
	            "id_Armazem" : "A1",
	            "Quantidade" : 2
            }
         */
        public HttpResponseMessage InsertProduct(Lib_Primavera.Model.Carrinho carrinho)
        {
            bool succ = Lib_Primavera.PriIntegration.InsereProduct(carrinho);

            HttpResponseMessage response;

            if (succ)
                response = Request.CreateResponse(HttpStatusCode.Created);
            else
                response = Request.CreateResponse(HttpStatusCode.BadRequest);

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }

        // GET /carrinho/getbyuser/{user do cliente}
        /*
        public HttpResponseMessage GetByID(string param)
        {
            Lib_Primavera.Model.Carrinho carrinho = null; // Lib_Primavera.PriIntegration.GetClientCheckoutList(param);

            HttpResponseMessage response;
            if (carrinho == null)
            {
                response = Request.CreateResponse(HttpStatusCode.NotFound);
            }
            else
            {
                response = Request.CreateResponse(HttpStatusCode.OK, carrinho);
            }

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }
         * */
    }
}
