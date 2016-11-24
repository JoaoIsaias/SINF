using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace FirstREST.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult Teste()
        {
            return View("/Views/Home/teste.cshtml");  
        }

        public ActionResult Teste1()
        {
            Lib_Primavera.Model.Artigo artigo = Lib_Primavera.PriIntegration.GetArtigo("A0002");
            ViewBag.Descricao = artigo.DescArtigo;
            ViewBag.Preco = artigo.Preco;
            return View("/Views/Home/product.cshtml");  
        }
    }
}
