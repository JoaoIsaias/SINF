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

        public string User
        {
            get;
            set;
        }

        public string Password
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

        public string Morada
        {
            get;
            set;
        }

        public string Local
        {
            get;
            set;
        }
        public string CodigoPostal
        {
            get;
            set;
        }
        public string Localidade
        {
            get;
            set;
        }

        public string Pais
        {
            get;
            set;
        }

        public string ModoPagamento
        {
            get;
            set;
        }

        public string CondPagamento
        {
            get;
            set;
        }

        public string ModoExp
        {
            get;
            set;
        }

        public float Desconto
        {
            get;
            set;
        }

        public string Moeda
        {
            get;
            set;
        }
    }
}