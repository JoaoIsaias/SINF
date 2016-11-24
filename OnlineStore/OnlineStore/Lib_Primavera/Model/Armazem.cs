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

        //não existe o atributo stock na base de dados do Primavera
        public double Stock
        {
            get;
            set;
        }
    }
}
