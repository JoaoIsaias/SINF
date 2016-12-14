using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace FirstREST.Lib_Primavera.Model
{
    public class DocVenda
    {

        public string id
        {
            get;
            set;
        }

        public int NumDoc
        {
            get;
            set;
        }

        public DateTime Data
        {
            get;
            set;
        }

        public string Entidade
        {
            get;
            set;
        }

        public string Serie
        {
            get;
            set;
        }

        public List<Model.LinhaDocVenda> LinhasDoc
        {
            get;
            set;
        }

        public double Preco
        {
            get;
            set;
        }

        public double IVA
        {
            get;
            set;
        }

        public string Estado
        {
            get;
            set;
        }
    }
}