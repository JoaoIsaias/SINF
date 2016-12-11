using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using FirstREST.Lib_Primavera.Model;

namespace FirstREST.Controllers
{
    public class ClienteController : ApiController
    {
        // GET /cliente/getbyuser/{user do cliente}
        public HttpResponseMessage GetByUser(string param)
        {
            Lib_Primavera.Model.Cliente cliente = Lib_Primavera.PriIntegration.GetCliente(param);

            HttpResponseMessage response;
            if (cliente == null)
            {
                response = Request.CreateResponse(HttpStatusCode.NotFound);
            }
            else
            {
                response = Request.CreateResponse(HttpStatusCode.OK, cliente);
            }

            response.Headers.Add("Access-Control-Allow-Origin", "*");

            return response;
        }
    }
}
