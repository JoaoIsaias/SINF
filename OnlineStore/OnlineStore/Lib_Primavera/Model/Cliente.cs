using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace FirstREST.Lib_Primavera.Model
{
    public class Cliente
    {
       
        public string CodCliente //id
        {
            get;
            set;
        }

        public string NomeCliente
        {
            get;
            set;
        }

        public string NumContribuinte
        {
            get;
            set;
        }

        public string Moeda
        {
            get;
            set;
        }

        public string Email
        {
            get;
            set;
        }

        public string Morada
        {
            get;
            set;
        }

        public string Telemóvel
        {
            get;
            set;
        }

        public string Localidade
        {
            get;
            set;
        }
    }
}