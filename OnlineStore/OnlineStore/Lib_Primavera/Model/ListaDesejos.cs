using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace FirstREST.Lib_Primavera.Model
{
    public class ListaDesejos
    {
        public string id_Lista
        {
            get;
            set;
        }

        public string id_Cliente
        {
            get;
            set;
        }

        public List<Model.Artigo> id_Artigos
        {
            get;
            set;
        }
    }
}