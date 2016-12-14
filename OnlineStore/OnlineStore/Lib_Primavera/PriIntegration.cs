using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Interop.ErpBS900;
using Interop.StdPlatBS900;
using Interop.StdBE900;
using Interop.GcpBE900;
using ADODB;

namespace FirstREST.Lib_Primavera
{
    public class PriIntegration
    {
        # region Cliente

        public static List<Model.Cliente> ListaClientes()
        {
            
            StdBELista objList;

            List<Model.Cliente> listClientes = new List<Model.Cliente>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                //objList = PriEngine.Engine.Comercial.Clientes.LstClientes();

                objList = PriEngine.Engine.Consulta("SELECT Cliente, Nome, Moeda, NumContrib as NumContribuinte, Fac_Mor AS campo_exemplo FROM  CLIENTES");

                
                while (!objList.NoFim())
                {
                    listClientes.Add(new Model.Cliente
                    {
                        CodCliente = objList.Valor("Cliente"),
                        NomeCliente = objList.Valor("Nome"),
                        Moeda = objList.Valor("Moeda"),
                        NumContribuinte = objList.Valor("NumContribuinte"),
                        Morada = objList.Valor("campo_exemplo")
                    });
                    objList.Seguinte();

                }

                return listClientes;
            }
            else
                return null;
        }

        public static Lib_Primavera.Model.Cliente GetCliente(string user)
        {
            StdBELista objList;

            GcpBECliente objCliente = new GcpBECliente();
            Model.Cliente cli = new Model.Cliente();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objList = PriEngine.Engine.Consulta("Select Cliente, CDU_Password, Nome, EnderecoWeb, NumContrib, Fac_Mor, Fac_Local, Fac_Cp, Fac_Cploc, Pais, ModoPag, CondPag, ModoExp, Desconto, Moeda From Clientes Where Cliente Like '" + user + "'");

                if(objList.Vazia()){
                    return null;
                }

                cli.CodCliente = objList.Valor("Cliente");
                cli.Password = objList.Valor("CDU_Password");
                cli.NomeCliente = objList.Valor("Nome");
                cli.NumContribuinte = objList.Valor("NumContrib");
                cli.Morada = objList.Valor("Fac_Mor");
                cli.Local = objList.Valor("Fac_Local");
                cli.CodigoPostal = objList.Valor("Fac_Cp");
                cli.Localidade = objList.Valor("Fac_Cploc");
                cli.Pais = objList.Valor("Pais");
                cli.ModoPagamento = objList.Valor("ModoPag");
                cli.CondPagamento = objList.Valor("CondPag");
                cli.ModoExp = objList.Valor("ModoExp");
                cli.Desconto = objList.Valor("Desconto");
                cli.Moeda = objList.Valor("Moeda");
                cli.Email = objList.Valor("EnderecoWeb");

                return cli;
            }
            else
            {
                return null;
            }
        }

        public static Lib_Primavera.Model.RespostaErro UpdCliente(Lib_Primavera.Model.Cliente cliente)
        {
            Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();
           

            GcpBECliente objCli = new GcpBECliente();

            try
            {

                if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
                {

                    if (PriEngine.Engine.Comercial.Clientes.Existe(cliente.CodCliente) == false)
                    {
                        erro.Erro = 1;
                        erro.Descricao = "O cliente não existe";
                        return erro;
                    }
                    else
                    {

                        objCli = PriEngine.Engine.Comercial.Clientes.Edita(cliente.CodCliente);
                        objCli.set_EmModoEdicao(true);

                        objCli.set_Nome(cliente.NomeCliente);
                        objCli.set_NumContribuinte(cliente.NumContribuinte);
                        objCli.set_Moeda(cliente.Moeda);
                        objCli.set_Morada(cliente.Morada);

                        PriEngine.Engine.Comercial.Clientes.Actualiza(objCli);

                        erro.Erro = 0;
                        erro.Descricao = "Sucesso";
                        return erro;
                    }
                }
                else
                {
                    erro.Erro = 1;
                    erro.Descricao = "Erro ao abrir a empresa";
                    return erro;

                }

            }

            catch (Exception ex)
            {
                erro.Erro = 1;
                erro.Descricao = ex.Message;
                return erro;
            }

        }

        public static Lib_Primavera.Model.RespostaErro DelCliente(string codCliente)
        {

            Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();
            GcpBECliente objCli = new GcpBECliente();


            try
            {

                if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
                {
                    if (PriEngine.Engine.Comercial.Clientes.Existe(codCliente) == false)
                    {
                        erro.Erro = 1;
                        erro.Descricao = "O cliente não existe";
                        return erro;
                    }
                    else
                    {

                        PriEngine.Engine.Comercial.Clientes.Remove(codCliente);
                        erro.Erro = 0;
                        erro.Descricao = "Sucesso";
                        return erro;
                    }
                }

                else
                {
                    erro.Erro = 1;
                    erro.Descricao = "Erro ao abrir a empresa";
                    return erro;
                }
            }

            catch (Exception ex)
            {
                erro.Erro = 1;
                erro.Descricao = ex.Message;
                return erro;
            }

        }

        public static Lib_Primavera.Model.RespostaErro InsereClienteObj(Model.Cliente cli)
        {

            Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();
            

            GcpBECliente myCli = new GcpBECliente();

            try
            {
                if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
                {

                    myCli.set_Cliente(cli.CodCliente);
                    myCli.set_Nome(cli.NomeCliente);
                    myCli.set_NumContribuinte(cli.NumContribuinte);
                    myCli.set_Moeda(cli.Moeda);
                    myCli.set_Morada(cli.Morada);

                    PriEngine.Engine.Comercial.Clientes.Actualiza(myCli);

                    erro.Erro = 0;
                    erro.Descricao = "Sucesso";
                    return erro;
                }
                else
                {
                    erro.Erro = 1;
                    erro.Descricao = "Erro ao abrir empresa";
                    return erro;
                }
            }

            catch (Exception ex)
            {
                erro.Erro = 1;
                erro.Descricao = ex.Message;
                return erro;
            }
        }

        #endregion Cliente;   // -----------------------------  END   CLIENTE    -----------------------

        #region Artigo

        public static List<Model.Artigo> ListaArtigos()
        {

            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select Artigo, Iva, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo");

                while (!objList.NoFim())
                {
                    art = new Model.Artigo();

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");
                    art.Stock = objList.Valor("STKActual");
                    art.Iva = objList.Valor("Iva");

                    listArts.Add(art);
                    objList.Seguinte();
                }

                return listArts;

            }
            else
            {
                return null;

            }
        }

        public static List<Model.Artigo> Lista16RandArtigos()
        {
            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select Top 16 Artigo, Iva, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Familia != 'IGNORAR' Order By NEWID()");

                while (!objList.NoFim())
                {
                    art = new Model.Artigo();

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");
                    art.Stock = objList.Valor("STKActual");
                    art.Iva = objList.Valor("Iva");

                    listArts.Add(art);
                    objList.Seguinte();
                }

                return listArts;

            }
            else
            {
                return null;

            }
        }

        public static List<Model.Artigo> Lista32RandArtigos()
        {
            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select Top 32 Artigo, Iva, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Familia != 'IGNORAR' Order By NEWID()");

                while (!objList.NoFim())
                {
                    art = new Model.Artigo();

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");
                    art.Stock = objList.Valor("STKActual");
                    art.Iva = objList.Valor("Iva");

                    listArts.Add(art);
                    objList.Seguinte();
                }

                return listArts;

            }
            else
            {
                return null;

            }
        }

        public static Lib_Primavera.Model.Artigo GetArtigo(string codArtigo)
        {
            StdBELista objList;
            
            GcpBEArtigo objArtigo = new GcpBEArtigo();
            Model.Artigo art = new Model.Artigo();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                if (PriEngine.Engine.Comercial.Artigos.Existe(codArtigo) == false)
                {
                    return null;
                }
                else
                {
                    objList = PriEngine.Engine.Consulta("Select Artigo, Iva, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Artigo = '" + codArtigo + "'");

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");
                    art.Stock = objList.Valor("STKActual");
                    art.Iva = objList.Valor("Iva");

                    return art;
                }
                
            }
            else
            {
                return null;
            }

        }

        public static List<Model.Categoria> ListaCategorias()
        {
            StdBELista objList;

            List<Model.Categoria> listCategorias = new List<Model.Categoria>();
            Model.Categoria cat = new Model.Categoria();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select Familia, Descricao From Familias");

                while (!objList.NoFim())
                {
                    cat = new Model.Categoria();

                    cat.IdCategoria = objList.Valor("Familia");
                    cat.Descricao = objList.Valor("Descricao");

                    listCategorias.Add(cat);
                    objList.Seguinte();
                }

                return listCategorias;

            }
            else
            {
                return null;

            }

        }

        public static List<Model.Categoria> Lista4CategoriasRand()
        {
            StdBELista objList;

            List<Model.Categoria> listCategorias = new List<Model.Categoria>();
            Model.Categoria cat = new Model.Categoria();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("select top 4 Familia, Descricao from Familias where familia != 'IGNORAR' ORDER BY NEWID()");

                while (!objList.NoFim())
                {
                    cat = new Model.Categoria();

                    cat.IdCategoria = objList.Valor("Familia");
                    cat.Descricao = objList.Valor("Descricao");

                    listCategorias.Add(cat);
                    objList.Seguinte();
                }

                return listCategorias;

            }
            else
            {
                return null;

            }

        }

        public static String GetCategoryDescription(string familiaId)
        {
            StdBELista objList;

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                if (PriEngine.Engine.Comercial.Familias.Existe(familiaId) == false)
                {
                    return null;
                }
                else
                {
                    objList = PriEngine.Engine.Consulta("Select Descricao From Familias Where Familia = '" + familiaId + "'");

                    return objList.Valor("Descricao");
                }

            }
            else
            {
                return null;
            }

        }

        public static List<Model.Artigo> ListaArtigosDaCategoria(string familiaId)
        {

            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select Artigo, Iva, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Familia = '" + familiaId + "'");

                while (!objList.NoFim())
                {
                    art = new Model.Artigo();

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");
                    art.Stock = objList.Valor("STKActual");
                    art.Iva = objList.Valor("Iva");

                    listArts.Add(art);
                    objList.Seguinte();
                }

                return listArts;

            }
            else
            {
                return null;

            }

        }

        public static List<Model.Artigo> GetByIdList(Model.ListaArtigos lista)
        {
            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                string prepareQuerry = "(";
                for (int i = 0; i < lista.Artigos.Count() - 1; i++ )
                {
                    prepareQuerry += "'" + lista.Artigos.ElementAt(i) + "',";
                }
                if(lista.Artigos.Count() != 0){
                    prepareQuerry += "'" + lista.Artigos.ElementAt(lista.Artigos.Count() - 1) + "'";
                }
                prepareQuerry += ")";

                objList = PriEngine.Engine.Consulta("Select Artigo, Iva, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Artigo in " + prepareQuerry);

                while (!objList.NoFim())
                {
                    art = new Model.Artigo();

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");
                    art.Stock = objList.Valor("STKActual");
                    art.Iva = objList.Valor("Iva");

                    listArts.Add(art);
                    objList.Seguinte();
                }

                return listArts;

            }
            else
            {
                return null;

            }

        }

        public static List<Model.Artigo> Lista4ArtigosDaCategoriaRand(string familiaId)
        {

            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select top 4 Artigo, Iva, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Familia = '" + familiaId + "' ORDER BY NEWID()");

                while (!objList.NoFim())
                {
                    art = new Model.Artigo();

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");
                    art.Stock = objList.Valor("STKActual");
                    art.Iva = objList.Valor("Iva");

                    listArts.Add(art);
                    objList.Seguinte();
                }

                return listArts;

            }
            else
            {
                return null;

            }

        }

        public static List<Model.Marca> ListaMarcas()
        {

            StdBELista objList;

            Model.Marca marc = new Model.Marca();

            List<Model.Marca> listBrands = new List<Model.Marca>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select Marca, Descricao From Marcas");

                while (!objList.NoFim())
                {
                    marc = new Model.Marca();

                    marc.IdMarca = objList.Valor("Marca");
                    marc.Descricao = objList.Valor("Descricao");

                    listBrands.Add(marc);
                    objList.Seguinte();
                }

                return listBrands;

            }
            else
            {
                return null;

            }

        }

        public static String GetBrandDescription(string brandId)
        {
            StdBELista objList;

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                if (PriEngine.Engine.Comercial.Marcas.Existe(brandId) == false)
                {
                    return null;
                }
                else
                {
                    objList = PriEngine.Engine.Consulta("Select Descricao From Marcas Where Marca = '" + brandId + "'");

                    return objList.Valor("Descricao");
                }

            }
            else
            {
                return null;
            }

        }

        public static List<Model.Artigo> ListaArtigosDaMarca(string brandId)
        {

            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select Artigo, Iva, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Marca = '" + brandId + "'");

                while (!objList.NoFim())
                {
                    art = new Model.Artigo();

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");
                    art.Stock = objList.Valor("STKActual");
                    art.Iva = objList.Valor("Iva");

                    listArts.Add(art);
                    objList.Seguinte();
                }

                return listArts;

            }
            else
            {
                return null;

            }

        }

        public static IEnumerable<Model.Armazem> ListaStock(string codArtigo)
        {

            StdBELista objList;

            Model.Armazem armazem = new Model.Armazem();
            List<Model.Armazem> listWarehouses = new List<Model.Armazem>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objList = PriEngine.Engine.Consulta("Select Armazens.Armazem, Armazens.Descricao, tab.TotalStock, Armazens.Morada, Armazens.Localidade, Armazens.Cp, Armazens.CpLocalidade from Armazens Inner Join (select Armazem, Sum(StkActual) As TotalStock from ArtigoArmazem where Artigo = '" + codArtigo + "' group by Armazem) tab ON Armazens.Armazem = tab.Armazem");

                while (!objList.NoFim())
                {
                    armazem = new Model.Armazem();

                    armazem.IdArmazem = objList.Valor("Armazem");
                    armazem.Descricao = objList.Valor("Descricao");
                    armazem.Stock = objList.Valor("TotalStock");
                    armazem.Morada = objList.Valor("Morada");
                    armazem.Localidade = objList.Valor("Localidade");
                    armazem.CodPostal = objList.Valor("Cp");
                    armazem.CodPostalLocalidade = objList.Valor("CpLocalidade");

                    listWarehouses.Add(armazem);
                    objList.Seguinte();
                }

                return listWarehouses;

            }
            else
            {
                return null;

            }

        }

        #endregion Artigo

        #region Review

        public static bool InsereReview(Model.Review review)
        {
            GcpBeArtigoCliente artigoCliente = new GcpBeArtigoCliente();

            StdBECampo CDU_Classificacao = new StdBECampo();
            StdBECampo CDU_Review = new StdBECampo();
            StdBECampo CDU_Data = new StdBECampo();

            StdBECampos campos = new StdBECampos();

            try
            {
                if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
                {
                    artigoCliente.set_Artigo(review.CodArtigo);
                    artigoCliente.set_Cliente(review.CodCliente);

                    CDU_Classificacao.Nome = "CDU_Classificacao";
                    CDU_Review.Nome = "CDU_Review";
                    CDU_Data.Nome = "CDU_Data";

                    CDU_Classificacao.Valor = review.Classificacao;
                    CDU_Review.Valor = review.Comentario;
                    CDU_Data.Valor = review.Data;

                    campos.Insere(CDU_Classificacao);
                    campos.Insere(CDU_Review);
                    campos.Insere(CDU_Data);

                    artigoCliente.set_CamposUtil(campos);

                    PriEngine.Engine.Comercial.ArtigosClientes.Actualiza(artigoCliente);

                    return true;
                }

                return false;
            }
            catch (Exception e)
            {
                return false;
            }
        }

        public static bool RemoveReview(Model.Review review)
        {
            try
            {
                if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
                {
                    if (PriEngine.Engine.Comercial.ArtigosClientes.Existe(review.CodArtigo, review.CodCliente))
                    {
                        PriEngine.Engine.Comercial.ArtigosClientes.Remove(review.CodArtigo, review.CodCliente);
                        return true;
                    }
                }

                return false;
            }
            catch (Exception e)
            {
                return false;
            }
        }

        public static double GetClassificacao(string codArtigo)
        {

            StdBELista objList;

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select Artigo, AVG(CDU_Classificacao) As ClassificacaoMedia From ArtigoCliente Where Artigo = '" + codArtigo + "' Group By Artigo");

                if (!objList.NoFim())
                    return System.Convert.ToDouble(objList.Valor("ClassificacaoMedia"));
                else
                    return -1;
            }
            else
            {
                return -1;

            }

        }

        public static IEnumerable<Model.Review> ListaReviews(string codArtigo)
        {

            StdBELista objList;

            Model.Review review = new Model.Review();
            List<Model.Review> listReviews = new List<Model.Review>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList = PriEngine.Engine.Consulta("Select Cliente, CDU_Classificacao, CDU_Review, CDU_Data From ArtigoCliente Where Artigo = '" + codArtigo + "';");

                while (!objList.NoFim())
                {
                    review = new Model.Review();

                    review.CodArtigo = codArtigo;
                    review.CodCliente = objList.Valor("Cliente");
                    review.Classificacao = objList.Valor("CDU_Classificacao");
                    review.Comentario = objList.Valor("CDU_Review");
                    review.Data = objList.Valor("CDU_Data");

                    listReviews.Add(review);
                    objList.Seguinte();
                }

                return listReviews;

            }
            else
            {
                return null;

            }
        }

        #endregion Review

        #region DocCompra

        public static List<Model.DocCompra> VGR_List()
        {
                
            StdBELista objListCab;
            StdBELista objListLin;
            Model.DocCompra dc = new Model.DocCompra();
            List<Model.DocCompra> listdc = new List<Model.DocCompra>();
            Model.LinhaDocCompra lindc = new Model.LinhaDocCompra();
            List<Model.LinhaDocCompra> listlindc = new List<Model.LinhaDocCompra>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objListCab = PriEngine.Engine.Consulta("SELECT id, NumDocExterno, Entidade, DataDoc, NumDoc, TotalMerc, Serie From CabecCompras where TipoDoc='VGR'");
                while (!objListCab.NoFim())
                {
                    dc = new Model.DocCompra();
                    dc.id = objListCab.Valor("id");
                    dc.NumDocExterno = objListCab.Valor("NumDocExterno");
                    dc.Entidade = objListCab.Valor("Entidade");
                    dc.NumDoc = objListCab.Valor("NumDoc");
                    dc.Data = objListCab.Valor("DataDoc");
                    dc.TotalMerc = objListCab.Valor("TotalMerc");
                    dc.Serie = objListCab.Valor("Serie");
                    objListLin = PriEngine.Engine.Consulta("SELECT idCabecCompras, Artigo, Descricao, Quantidade, Unidade, PrecUnit, Desconto1, TotalILiquido, PrecoLiquido, Armazem, Lote from LinhasCompras where IdCabecCompras='" + dc.id + "' order By NumLinha");
                    listlindc = new List<Model.LinhaDocCompra>();

                    while (!objListLin.NoFim())
                    {
                        lindc = new Model.LinhaDocCompra();
                        lindc.IdCabecDoc = objListLin.Valor("idCabecCompras");
                        lindc.CodArtigo = objListLin.Valor("Artigo");
                        lindc.DescArtigo = objListLin.Valor("Descricao");
                        lindc.Quantidade = objListLin.Valor("Quantidade");
                        lindc.Unidade = objListLin.Valor("Unidade");
                        lindc.Desconto = objListLin.Valor("Desconto1");
                        lindc.PrecoUnitario = objListLin.Valor("PrecUnit");
                        lindc.TotalILiquido = objListLin.Valor("TotalILiquido");
                        lindc.TotalLiquido = objListLin.Valor("PrecoLiquido");
                        lindc.Armazem = objListLin.Valor("Armazem");
                        lindc.Lote = objListLin.Valor("Lote");

                        listlindc.Add(lindc);
                        objListLin.Seguinte();
                    }

                    dc.LinhasDoc = listlindc;
                    
                    listdc.Add(dc);
                    objListCab.Seguinte();
                }
            }
            return listdc;
        }

                
        public static Model.RespostaErro VGR_New(Model.DocCompra dc)
        {
            Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();
            

            GcpBEDocumentoCompra myGR = new GcpBEDocumentoCompra();
            GcpBELinhaDocumentoCompra myLin = new GcpBELinhaDocumentoCompra();
            GcpBELinhasDocumentoCompra myLinhas = new GcpBELinhasDocumentoCompra();

            PreencheRelacaoCompras rl = new PreencheRelacaoCompras();
            List<Model.LinhaDocCompra> lstlindv = new List<Model.LinhaDocCompra>();

            try
            {
                if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
                {
                    // Atribui valores ao cabecalho do doc
                    //myEnc.set_DataDoc(dv.Data);
                    myGR.set_Entidade(dc.Entidade);
                    myGR.set_NumDocExterno(dc.NumDocExterno);
                    myGR.set_Serie(dc.Serie);
                    myGR.set_Tipodoc("VGR");
                    myGR.set_TipoEntidade("F");
                    // Linhas do documento para a lista de linhas
                    lstlindv = dc.LinhasDoc;
                    //PriEngine.Engine.Comercial.Compras.PreencheDadosRelacionados(myGR,rl);
                    PriEngine.Engine.Comercial.Compras.PreencheDadosRelacionados(myGR);
                    foreach (Model.LinhaDocCompra lin in lstlindv)
                    {
                        PriEngine.Engine.Comercial.Compras.AdicionaLinha(myGR, lin.CodArtigo, lin.Quantidade, lin.Armazem, "", lin.PrecoUnitario, lin.Desconto);
                    }


                    PriEngine.Engine.IniciaTransaccao();
                    PriEngine.Engine.Comercial.Compras.Actualiza(myGR, "Teste");
                    PriEngine.Engine.TerminaTransaccao();
                    erro.Erro = 0;
                    erro.Descricao = "Sucesso";
                    return erro;
                }
                else
                {
                    erro.Erro = 1;
                    erro.Descricao = "Erro ao abrir empresa";
                    return erro;

                }

            }
            catch (Exception ex)
            {
                PriEngine.Engine.DesfazTransaccao();
                erro.Erro = 1;
                erro.Descricao = ex.Message;
                return erro;
            }
        }

        #endregion DocCompra

        #region DocsVenda

        public static Model.RespostaErro Encomendas_New(Model.DocVenda dv)
        {
            Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();
            GcpBEDocumentoVenda myEnc = new GcpBEDocumentoVenda();

            GcpBELinhaDocumentoVenda myLin = new GcpBELinhaDocumentoVenda();

            GcpBELinhasDocumentoVenda myLinhas = new GcpBELinhasDocumentoVenda();

            PreencheRelacaoVendas rl = new PreencheRelacaoVendas();
            List<Model.LinhaDocVenda> lstlindv = new List<Model.LinhaDocVenda>();

            try
            {
                if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
                {
                    myEnc.set_DataDoc(dv.Data);
                    myEnc.set_Entidade(dv.Entidade);
                    myEnc.set_Serie(dv.Serie);
                    myEnc.set_Tipodoc("ECL");
                    myEnc.set_TipoEntidade("C");
                    lstlindv = dv.LinhasDoc;
                    PriEngine.Engine.Comercial.Vendas.PreencheDadosRelacionados(myEnc);
                    foreach (Model.LinhaDocVenda lin in lstlindv)
                    {
                        PriEngine.Engine.Comercial.Vendas.AdicionaLinha(myEnc, lin.CodArtigo, lin.Quantidade, "", "", lin.PrecoUnitario, lin.Desconto);
                    }

                    PriEngine.Engine.IniciaTransaccao();
                    PriEngine.Engine.Comercial.Vendas.Actualiza(myEnc);
                    PriEngine.Engine.TerminaTransaccao();
                    erro.Erro = 0;
                    erro.Descricao = "Sucesso";
                    return erro;
                }
                else
                {
                    erro.Erro = 1;
                    erro.Descricao = "Erro ao abrir empresa";
                    return erro;

                }

            }
            catch (Exception ex)
            {
                PriEngine.Engine.DesfazTransaccao();
                erro.Erro = 1;
                erro.Descricao = ex.Message;
                return erro;
            }
        }

        public static List<Model.DocVenda> GetEncomendasCliente(string idCliente)
        {
            StdBELista objList;
            List<Model.DocVenda> listdv = new List<Model.DocVenda>();
            List<Model.LinhaDocVenda> listlindv = new List<Model.LinhaDocVenda>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objList = PriEngine.Engine.Consulta("SELECT TOP 10 Id, DataGravacao, TotalMerc, TotalIva, Estado, TipoDoc, NumDoc FROM CabecDoc, CabecDocStatus WHERE Id=IdCabecDoc AND TipoDoc='ECL' AND Entidade='" + idCliente + "' ORDER BY DataGravacao DESC");
                while (!objList.NoFim())
                {
                    Model.DocVenda dv = new Model.DocVenda();
                    dv.id = objList.Valor("Id");
                    dv.Data = objList.Valor("DataGravacao");
                    dv.Preco = objList.Valor("TotalMerc");
                    dv.IVA = objList.Valor("TotalIva");
                    dv.Estado = objList.Valor("Estado");
                    dv.NumDoc = objList.Valor("NumDoc");

                    listdv.Add(dv);
                    objList.Seguinte();
                }

            }
            return listdv;
        }

        public static List<Model.LinhaDocVenda> GetArtigosDaEncomenda(string idEncomenda)
        {
            StdBELista objListLin;
            List<Model.LinhaDocVenda> listlindv = new List<Model.LinhaDocVenda>();
            Model.LinhaDocVenda lindv;

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objListLin = PriEngine.Engine.Consulta("SELECT Artigo, Descricao, Quantidade from LinhasDoc where IdCabecDoc='" + idEncomenda + "'");
                listlindv = new List<Model.LinhaDocVenda>();

                while (!objListLin.NoFim())
                {
                    lindv = new Model.LinhaDocVenda();
                    lindv.CodArtigo = objListLin.Valor("Artigo");
                    lindv.Quantidade = objListLin.Valor("Quantidade");
                    listlindv.Add(lindv);
                    objListLin.Seguinte();
                }
            }
            return listlindv;
        }

        public static String GetEstadoEncomenda(string numeroDoc)
        {
            StdBELista objList1, objList2;

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                objList1 = PriEngine.Engine.Consulta("SELECT TOP(1) CabecDoc.TipoDoc, CabecDoc.NumDoc, Estado FROM  CabecDocStatus, CabecDoc CabecDoc_1 INNER JOIN LinhasDoc LinhasDoc_1 ON CabecDoc_1.Id = LinhasDoc_1.IdCabecDoc LEFT OUTER JOIN LinhasDocTrans ON LinhasDoc_1.Id = LinhasDocTrans.IdLinhasDocOrigem RIGHT OUTER JOIN CabecDoc INNER JOIN LinhasDoc ON CabecDoc.Id = LinhasDoc.IdCabecDoc ON LinhasDocTrans.IdLinhasDoc = LinhasDoc.Id WHERE (CabecDoc_1.TipoDoc = 'ECL') AND (CabecDoc_1.NumDoc = " + numeroDoc + ") AND Estado = 'T'");

                if (objList1.Vazia())
                {
                    return numeroDoc;
                }

                objList2 = PriEngine.Engine.Consulta("SELECT TOP(1) CabecDoc.TipoDoc, CabecDoc.NumDoc, Estado FROM  PRIDEMOSINF.dbo.CabecDocStatus, PRIDEMOSINF.dbo.CabecDoc CabecDoc_1 INNER JOIN PRIDEMOSINF.dbo.LinhasDoc LinhasDoc_1 ON CabecDoc_1.Id = LinhasDoc_1.IdCabecDoc LEFT OUTER JOIN PRIDEMOSINF.dbo.LinhasDocTrans ON LinhasDoc_1.Id = LinhasDocTrans.IdLinhasDocOrigem RIGHT OUTER JOIN PRIDEMOSINF.dbo.CabecDoc INNER JOIN PRIDEMOSINF.dbo.LinhasDoc ON CabecDoc.Id = LinhasDoc.IdCabecDoc ON LinhasDocTrans.IdLinhasDoc = LinhasDoc.Id WHERE (CabecDoc_1.TipoDoc = 'GR') AND (CabecDoc_1.NumDoc = " + objList1.Valor("NumDoc") + ") AND Estado = 'T'");

                if (objList2.Valor("TipoDoc").Equals("FA"))
                {
                    return "Completa";
                }
                else if (objList2.Valor("TipoDoc").Equals("FAI"))
                {
                    return "Completa";
                }
                else if (objList1.Valor("TipoDoc").Equals("GR"))
                {
                    return "Expedida";
                }
                else if (objList1.Valor("TipoDoc").Equals("FA"))
                {
                    return "Completa";
                }
                else if (objList1.Valor("TipoDoc").Equals("FAI"))
                {
                    return "Completa";
                }
                else
                {
                    return "Erro";
                }
            }
            else
            {
                return null;
            }

        }

        #endregion DocsVenda

        #region WishList

        #endregion WishList

        # region Search

        public static List<Model.Artigo> ListaSearch(string querry1, string querry2)
        {

            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objList = PriEngine.Engine.Consulta("Select Artigo, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem From Artigo Where Descricao like '%" + querry1 + "%' and ( Familia like '%" + querry2 + "%' or Marca like '%" + querry2 + "%' )");

                while (!objList.NoFim())
                {
                    art = new Model.Artigo();

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");

                    listArts.Add(art);
                    objList.Seguinte();
                }

                return listArts;

            }
            else
            {
                return null;

            }

        }

        #endregion Search

        #region Armazem

        public static List<Lib_Primavera.Model.Armazem> GetArmazens()
        {
            StdBELista objList;

            List<Model.Armazem> armazens = new List<Model.Armazem>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objList = PriEngine.Engine.Consulta("Select Armazem, Descricao From Armazens");

                while (!objList.NoFim())
                {
                    Model.Armazem armazem = new Model.Armazem();
                    armazem.IdArmazem = objList.Valor("Armazem");
                    armazem.Descricao = objList.Valor("Descricao");
                    armazens.Add(armazem);
                    objList.Seguinte();

                }

                return armazens;
            }
            else
                return null;

        }

        #endregion Armazem
    }
}