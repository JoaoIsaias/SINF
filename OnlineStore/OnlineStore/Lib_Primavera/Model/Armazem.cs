using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace FirstREST.Lib_Primavera.Model
{
    public class Armazem
    {
        public string IdArmazem
        {
            get;
            set;
        }

        public string Descricao
        {
            get;
            set;
        }

        public double Stock
        {
            get;
            set;
        }

        public string Morada
        {
            get;
            set;
        }

        public string Localidade
        {
            get;
            set;
        }

        public string CodPostal
        {
            get;
            set;
        }

        public string CodPostalLocalidade
        {
            get;
            set;
        }
    }
}
