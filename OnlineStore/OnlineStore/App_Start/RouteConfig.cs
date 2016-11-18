using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Routing;

namespace FirstREST
{
    public class RouteConfig
    {
        public static void RegisterRoutes(RouteCollection routes)
        {
            routes.IgnoreRoute("{resource}.axd/{*pathInfo}");

            routes.MapRoute(
                name: "Default",
                url: "{controller}/{action}/{id}",
                defaults: new { controller = "Home", action = "Index", id = UrlParameter.Optional }
            );

            /*routes.MapRoute(
                "Home",
                "Home/{op1}/{op2}",
                new
                {
                    controller = "Home",
                    action = "Index",
                    op1 = UrlParameter.Optional,
                    op2 = UrlParameter.Optional
                }
            );*/
        }
    }
}