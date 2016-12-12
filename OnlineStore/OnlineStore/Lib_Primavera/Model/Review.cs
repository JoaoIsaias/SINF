using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace FirstREST.Lib_Primavera.Model
{
    public class Review
    {
        public string CodArtigo
        {
            get;
            set;
        }

        public string CodCliente
        {
            get;
            set;
        }

        public int Classificacao
        {
            get;
            set;
        }

        public string Comentario
        {
            get;
            set;
        }

        public string Data
        {
            get;
            set;
        }
    }
}
