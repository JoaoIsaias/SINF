﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace FirstREST.Lib_Primavera.Model
{
    public class Artigo
    {
        public string CodArtigo
        {
            get;
            set;
        }

        public string DescArtigo
        {
            get;
            set;
        }

        public double Preco
        {
            get;
            set;
        }

        public string Iva
        {
            get;
            set;
        }

        public string Familia //categoria
        {
            get;
            set;
        }

        public string Marca
        {
            get;
            set;
        }

        public string Imagem
        {
            get;
            set;
        }

        public int Quantidade
        {
            get;
            set;
        }

        public string Armazem
        {
            get;
            set;
        }

        public double Stock
        {
            get;
            set;
        }
    }
}