﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace FirstREST.Lib_Primavera.Model
{
    public class RespostaErro : ApiController
    {
        public int Erro
        { get; set; }

        public string Descricao
        { get; set; }
    }
}
