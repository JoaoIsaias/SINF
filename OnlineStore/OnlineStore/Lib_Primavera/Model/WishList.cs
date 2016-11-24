using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace FirstREST.Lib_Primavera.Model
{
    public class WishList
    {
        public string idCliente
        {
            get;
            set;
        }

        public string idWishList
        {
            get;
            set;
        }

        public List<Model.Artigo> Produtos
        {
            get;
            set;
        }
    }
}