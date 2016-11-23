using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using FirstREST.Lib_Primavera.Model;


namespace FirstREST.Controllers
{
    public class ArtigosController : ApiController
    {
        // GET /artigos/getalllist
        public IEnumerable<Lib_Primavera.Model.Artigo> GetAllList()
        {
            return Lib_Primavera.PriIntegration.ListaArtigos();
        }

        // GET /artigos/getbyid/{id do artigo}
        public HttpResponseMessage GetByID(string param)
        {
            Lib_Primavera.Model.Artigo artigo = Lib_Primavera.PriIntegration.GetArtigo(param);
            if (artigo == null)
            {
                return Request.CreateResponse(HttpStatusCode.NotFound);
            }
            else
            {
                return Request.CreateResponse(HttpStatusCode.OK, artigo);
            }
        }

        // GET /artigos/getallcategories
        public IEnumerable<String> GetAllCategories()
        {
            return Lib_Primavera.PriIntegration.ListaCategorias();
        }

        // GET /artigos/getbycategory/{id da categoria}
        public IEnumerable<Lib_Primavera.Model.Artigo> GetByCategory(string param)
        {
            return Lib_Primavera.PriIntegration.ListaArtigosDaCategoria(param);
        }

        // GET /artigos/getallbrands
        public IEnumerable<String> GetAllBrands()
        {
            return Lib_Primavera.PriIntegration.ListaMarcas();
        }

        // GET /artigos/getbybrand/{id da marca}
        public IEnumerable<Lib_Primavera.Model.Artigo> GetByBrand(string param)
        {
            return Lib_Primavera.PriIntegration.ListaArtigosDaMarca(param);
        }
    }
}

