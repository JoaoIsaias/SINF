using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace FirstREST.Lib_Primavera.Model
{
    public class CarrinhoDeCompras : ApiController
    {
        public string idCliente
        {
            get;
            set;
        }

        public string idArtigo
        {
            get;
            set;
        }

        public string Quantidade
        {
            get;
            set;
        }

        public string idArmazem
        {
            get;
            set;
        }
    }
}
