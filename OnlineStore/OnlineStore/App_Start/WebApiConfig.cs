﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web.Http;

namespace FirstREST
{
    public static class WebApiConfig
    {
        public static void Register(HttpConfiguration config)
        {
            config.Routes.MapHttpRoute(
                name: "DefaultApi",
                routeTemplate: "{controller}/{action}/{param}/{param2}",
                defaults: new { param = RouteParameter.Optional, param2 = RouteParameter.Optional }
            );

            config.Formatters.JsonFormatter.SupportedMediaTypes.Add(new System.Net.Http.Headers.MediaTypeHeaderValue("text/html"));
        }
    }
}
