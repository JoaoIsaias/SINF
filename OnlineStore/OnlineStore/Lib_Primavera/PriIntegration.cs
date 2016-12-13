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

                objList = PriEngine.Engine.Consulta("Select Artigo, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo");

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
                    objList = PriEngine.Engine.Consulta("Select Artigo, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Artigo = '" + codArtigo + "'");

                    art.CodArtigo = objList.Valor("Artigo");
                    art.DescArtigo = objList.Valor("Descricao");
                    art.Preco = objList.Valor("PCPadrao");
                    art.Familia = objList.Valor("Familia");
                    art.Marca = objList.Valor("Marca");
                    art.Imagem = objList.Valor("CDU_DirImagem");
                    art.Stock = objList.Valor("STKActual");

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

                objList = PriEngine.Engine.Consulta("Select Artigo, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Familia = '" + familiaId + "'");

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

                objList = PriEngine.Engine.Consulta("Select Artigo, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem, STKActual From Artigo Where Marca = '" + brandId + "'");

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

        public static List<Model.DocVenda> GET_Pedidos(string idCliente)
        {
            StdBELista objList, objListLin, objDataLiq;
            List<Model.DocVenda> listdv = new List<Model.DocVenda>();
            List<Model.LinhaDocVenda> listlindv = new List<Model.LinhaDocVenda>();
            Model.LinhaDocVenda lindv;

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objList = PriEngine.Engine.Consulta("select Id,Data,TotalMerc, TotalIva, Estado from CabecDoc JOIN CabecDocStatus ON CabecDoc.Id = CabecDocStatus.IdCabecDoc where TipoDoc = 'FA' and Entidade = '" + idCliente + "' order By NumDoc DESC");
                while (!objList.NoFim())
                {
                    Model.DocVenda dv = new Model.DocVenda();
                    dv.id = objList.Valor("Id");
                    dv.Data = objList.Valor("Data");
                    dv.PrecoFinal = (double.Parse(objList.Valor("TotalMerc").ToString()) + double.Parse((objList.Valor("TotalIva").ToString())));
                    //dv.PrecoFinal = objList.Valor("TotalMerc") + "€ + IVA";

                    if (objList.Valor("Estado") == "T")
                    {
                        dv.Estado = "Pronto";
                    }
                    else if (objList.Valor("Estado") == "P")
                    {
                        dv.Estado = "Pendente";
                    }
                    else dv.Estado = "Anulado";

                    objListLin = PriEngine.Engine.Consulta("SELECT Artigo,Descricao,Quantidade from LinhasDoc where IdCabecDoc='" + dv.id + "'");
                    listlindv = new List<Model.LinhaDocVenda>();

                    while (!objListLin.NoFim())
                    {
                        lindv = new Model.LinhaDocVenda();
                        lindv.DescArtigo = objListLin.Valor("Descricao");
                        lindv.CodArtigo = objListLin.Valor("Artigo");
                        lindv.Quantidade = objListLin.Valor("Quantidade");
                        listlindv.Add(lindv);
                        objListLin.Seguinte();
                    }

                    objDataLiq = PriEngine.Engine.Consulta("SELECT DataLiq from Historico where idDoc='" + dv.id + "'");

                    try
                    {

                        dv.DataLiq = objDataLiq.Valor("DataLiq").ToString();
                        if (dv.DataLiq != "")
                            dv.DataLiq = "Pago";
                        else
                            dv.DataLiq = "Por Pagar";


                    }
                    catch (Exception e)
                    {
                        dv.DataLiq = "Por Pagar";
                    }



                    dv.LinhasDoc = listlindv;

                    listdv.Add(dv);
                    objList.Seguinte();
                }
            }
            return listdv;
        }

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
                    // Atribui valores ao cabecalho do doc
                    //myEnc.set_DataDoc(dv.Data);
                    myEnc.set_Entidade(dv.Entidade);
                    myEnc.set_Serie(dv.Serie);
                    myEnc.set_Tipodoc("ECL");
                    myEnc.set_TipoEntidade("C");
                    // Linhas do documento para a lista de linhas
                    lstlindv = dv.LinhasDoc;
                    //PriEngine.Engine.Comercial.Vendas.PreencheDadosRelacionados(myEnc, rl);
                    PriEngine.Engine.Comercial.Vendas.PreencheDadosRelacionados(myEnc);
                    foreach (Model.LinhaDocVenda lin in lstlindv)
                    {
                        PriEngine.Engine.Comercial.Vendas.AdicionaLinha(myEnc, lin.CodArtigo, lin.Quantidade, "", "", lin.PrecoUnitario, lin.Desconto);
                    }


                   // PriEngine.Engine.Comercial.Compras.TransformaDocumento(

                    PriEngine.Engine.IniciaTransaccao();
                    //PriEngine.Engine.Comercial.Vendas.Edita Actualiza(myEnc, "Teste");
                    PriEngine.Engine.Comercial.Vendas.Actualiza(myEnc, "Teste");
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

        public static List<Model.DocVenda> Encomendas_List()
        {
            
            StdBELista objListCab;
            StdBELista objListLin;
            Model.DocVenda dv = new Model.DocVenda();
            List<Model.DocVenda> listdv = new List<Model.DocVenda>();
            Model.LinhaDocVenda lindv = new Model.LinhaDocVenda();
            List<Model.LinhaDocVenda> listlindv = new
            List<Model.LinhaDocVenda>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objListCab = PriEngine.Engine.Consulta("SELECT id, Entidade, Data, NumDoc, TotalMerc, Serie From CabecDoc where TipoDoc='ECL'");
                while (!objListCab.NoFim())
                {
                    dv = new Model.DocVenda();
                    dv.id = objListCab.Valor("id");
                    dv.Entidade = objListCab.Valor("Entidade");
                    dv.NumDoc = objListCab.Valor("NumDoc");
                    dv.Data = objListCab.Valor("Data");
                    dv.TotalMerc = objListCab.Valor("TotalMerc");
                    dv.Serie = objListCab.Valor("Serie");
                    objListLin = PriEngine.Engine.Consulta("SELECT idCabecDoc, Artigo, Descricao, Quantidade, Unidade, PrecUnit, Desconto1, TotalILiquido, PrecoLiquido from LinhasDoc where IdCabecDoc='" + dv.id + "' order By NumLinha");
                    listlindv = new List<Model.LinhaDocVenda>();

                    while (!objListLin.NoFim())
                    {
                        lindv = new Model.LinhaDocVenda();
                        lindv.IdCabecDoc = objListLin.Valor("idCabecDoc");
                        lindv.CodArtigo = objListLin.Valor("Artigo");
                        lindv.DescArtigo = objListLin.Valor("Descricao");
                        lindv.Quantidade = objListLin.Valor("Quantidade");
                        lindv.Unidade = objListLin.Valor("Unidade");
                        lindv.Desconto = objListLin.Valor("Desconto1");
                        lindv.PrecoUnitario = objListLin.Valor("PrecUnit");
                        lindv.TotalILiquido = objListLin.Valor("TotalILiquido");
                        lindv.TotalLiquido = objListLin.Valor("PrecoLiquido");

                        listlindv.Add(lindv);
                        objListLin.Seguinte();
                    }

                    dv.LinhasDoc = listlindv;
                    listdv.Add(dv);
                    objListCab.Seguinte();
                }
            }
            return listdv;
        }

        public static Model.DocVenda Encomenda_Get(string numdoc)
        {
            StdBELista objListCab;
            StdBELista objListLin;
            Model.DocVenda dv = new Model.DocVenda();
            Model.LinhaDocVenda lindv = new Model.LinhaDocVenda();
            List<Model.LinhaDocVenda> listlindv = new List<Model.LinhaDocVenda>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                

                string st = "SELECT id, Entidade, Data, NumDoc, TotalMerc, Serie From CabecDoc where TipoDoc='ECL' and NumDoc='" + numdoc + "'";
                objListCab = PriEngine.Engine.Consulta(st);
                dv = new Model.DocVenda();
                dv.id = objListCab.Valor("id");
                dv.Entidade = objListCab.Valor("Entidade");
                dv.NumDoc = objListCab.Valor("NumDoc");
                dv.Data = objListCab.Valor("Data");
                dv.TotalMerc = objListCab.Valor("TotalMerc");
                dv.Serie = objListCab.Valor("Serie");
                objListLin = PriEngine.Engine.Consulta("SELECT idCabecDoc, Artigo, Descricao, Quantidade, Unidade, PrecUnit, Desconto1, TotalILiquido, PrecoLiquido from LinhasDoc where IdCabecDoc='" + dv.id + "' order By NumLinha");
                listlindv = new List<Model.LinhaDocVenda>();

                while (!objListLin.NoFim())
                {
                    lindv = new Model.LinhaDocVenda();
                    lindv.IdCabecDoc = objListLin.Valor("idCabecDoc");
                    lindv.CodArtigo = objListLin.Valor("Artigo");
                    lindv.DescArtigo = objListLin.Valor("Descricao");
                    lindv.Quantidade = objListLin.Valor("Quantidade");
                    lindv.Unidade = objListLin.Valor("Unidade");
                    lindv.Desconto = objListLin.Valor("Desconto1");
                    lindv.PrecoUnitario = objListLin.Valor("PrecUnit");
                    lindv.TotalILiquido = objListLin.Valor("TotalILiquido");
                    lindv.TotalLiquido = objListLin.Valor("PrecoLiquido");
                    listlindv.Add(lindv);
                    objListLin.Seguinte();
                }

                dv.LinhasDoc = listlindv;
                return dv;
            }
            return null;
        }

        public static List<Model.DocVenda> Encomenda_GetAllClientOrders(string codCliente)
        {
            ErpBS objMotor = new ErpBS();

            StdBELista objListCab;
            StdBELista objListLin;
            Model.DocVenda dv = new Model.DocVenda();
            List<Model.DocVenda> listdv = new List<Model.DocVenda>();
            Model.LinhaDocVenda lindv = new Model.LinhaDocVenda();
            List<Model.LinhaDocVenda> listlindv = new
            List<Model.LinhaDocVenda>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {
                objListCab = PriEngine.Engine.Consulta("SELECT id, Entidade, Data, NumDoc, TotalMerc, TotalIva, TotalDesc, Serie  From CabecDoc where TipoDoc='FA' AND Entidade='" + codCliente + "'");
                while (!objListCab.NoFim())
                {
                    dv = new Model.DocVenda();
                    dv.id = objListCab.Valor("id");
                    dv.Entidade = objListCab.Valor("Entidade");
                    dv.NumDoc = objListCab.Valor("NumDoc");
                    dv.Data = objListCab.Valor("Data");
                    dv.Serie = objListCab.Valor("Serie");

                    double preço = 0;


                    objListLin = PriEngine.Engine.Consulta("SELECT idCabecDoc, Artigo, Descricao, Quantidade, Unidade, PrecUnit, Desconto1, TotalILiquido, PrecoLiquido from LinhasDoc where IdCabecDoc='" + dv.id + "' order By NumLinha");
                    listlindv = new List<Model.LinhaDocVenda>();

                    while (!objListLin.NoFim())
                    {
                        lindv = new Model.LinhaDocVenda();
                        lindv.IdCabecDoc = objListLin.Valor("idCabecDoc");
                        lindv.CodArtigo = objListLin.Valor("Artigo");
                        lindv.DescArtigo = objListLin.Valor("Descricao");
                        lindv.Quantidade = objListLin.Valor("Quantidade");
                        lindv.Unidade = objListLin.Valor("Unidade");
                        lindv.Desconto = objListLin.Valor("Desconto1");
                        lindv.PrecoUnitario = objListLin.Valor("PrecUnit");
                        lindv.TotalILiquido = objListLin.Valor("TotalILiquido");
                        lindv.TotalLiquido = objListLin.Valor("PrecoLiquido");
                        preço += lindv.TotalILiquido - lindv.Desconto;

                        listlindv.Add(lindv);
                        objListLin.Seguinte();
                    }

                    dv.PrecoFinal = preço;
                    dv.LinhasDoc = listlindv;
                    listdv.Add(dv);
                    objListCab.Seguinte();
                }
            }
            return listdv;
        }

        #endregion DocsVenda

        #region WishList

        #endregion WishList

        # region Search

        public static List<Model.Artigo> ListaSearch(string querry)
        {

            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany(FirstREST.Properties.Settings.Default.Company.Trim(), FirstREST.Properties.Settings.Default.User.Trim(), FirstREST.Properties.Settings.Default.Password.Trim()) == true)
            {

                string likeQuerry = "%" + querry + "%";
                objList = PriEngine.Engine.Consulta("Select Artigo, Descricao, PCPadrao, Familia, Marca, CDU_DirImagem From Artigo Where Descricao like '" + likeQuerry + "'");

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