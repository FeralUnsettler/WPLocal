<p align="center">
  <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200&auto=format&fit=crop" alt="Guarau UFO Banner" width="100%" style="border-radius: 12px; box-shadow: 0px 10px 30px rgba(0, 229, 255, 0.25);" />
</p>

<h1 align="center">🚀 GUIA OFICIAL DE DEPLOY NO CPANEL / HPANEL HOSTINGER</h1>
<h3 align="center">Domínio de Produção: <a href="https://guaraufo.adzon.com.br/" target="_blank">https://guaraufo.adzon.com.br/</a> &bull; Versão 3.6.0-PRO</h3>

<p align="center">
  <img src="https://img.shields.io/badge/Hostinger-cPanel%20%2F%20hPanel-673DE6?style=for-the-badge&logo=hostinger&logoColor=white" alt="Hostinger Deploy" />
  <img src="https://img.shields.io/badge/Domain-guaraufo.adzon.com.br-00E5FF?style=for-the-badge&logo=google-chrome&logoColor=black" alt="Domain Production" />
  <img src="https://img.shields.io/badge/Database-URLs%20100%25%20Migrated-25D366?style=for-the-badge&logo=mysql&logoColor=white" alt="Database Ready" />
</p>

---

## 📦 Conteúdo do Kit de Deploy (`deploy_hostinger_guaraufo/`)

Este diretório contém absolutamente tudo o que é necessário para subir a plataforma no painel da **Hostinger** com 1 clique, sem erros de permissão e sem quebrar imagens:

| Arquivo no Pacote | Descrição e Função no Sistema |
| :--- | :--- |
| **`guaraufo_production_db.sql`** | 🗄️ **Banco de Dados de Produção Onde Tudo Acontece:** Todas as tabelas do WordPress com links, mídias e opções já reescritos e traduzidos milimetricamente para o domínio `https://guaraufo.adzon.com.br`. |
| **`ufoturismo-child.zip`** | 🎨 **Tema Filho Principal (v3.6.0-PRO):** Contém toda a reestilização de 1440px/200px margem, Jumbotron de 4 slides, galerias Netflix, motor de tradução PT-BR e áreas de AdSense. |
| **`hello-elementor-parent.zip`** | 🏗️ **Tema Pai (Base):** Estrutura fundamental exigida pelo WordPress para dar suporte e performance ao nosso tema filho. |
| **`uploads-media-backup.zip`** | 🖼️ **Acervo Fotográfico e Mídias:** Backup completo de todas as imagens, ícones e anexos de postagens gravados na pasta `wp-content/uploads/`. |

---

## 🛠️ Passo a Passo para Subir na Hostinger (Em Menos de 5 Minutos)

### FASE 1: Instalação Limpa no Painel da Hostinger (hPanel / cPanel)
1. Acesse sua conta Hostinger e entre na gerência do domínio **`guaraufo.adzon.com.br`**.
2. Clique na opção **Auto Instalador (Auto Installer)** ou **WordPress Overview** e faça a instalação de uma cópia limpa do WordPress com HTTPS (Certificado SSL grátis ativado).
3. Anote os dados do banco de dados (Nome da Base de Dados MySQL, Usuário e Senha) mostrados no painel de detalhes do banco.

---

### FASE 2: Envio dos Temas (Aparência do Site)
Você pode escolher entre 2 métodos simples:

#### Método A: Via Painel Administrativo WordPress (`https://guaraufo.adzon.com.br/wp-admin/`)
1. No menu lateral, acesse **Aparência &rarr; Temas &rarr; Adicionar Novo &rarr; Enviar Tema**.
2. Selecione o arquivo **`hello-elementor-parent.zip`**, instale (não precisa ativar ainda).
3. Em seguida, selecione o arquivo **`ufoturismo-child.zip`**, instale e **ATIVE ESTE TEMA (UFOTurismo Child)**! 🚀

#### Método B: Via Gerenciador de Arquivos (File Manager do hPanel)
1. Acesse o **Gerenciador de Arquivos** no painel da Hostinger e navegue até:  
   `/public_html/wp-content/themes/`
2. Envie os arquivos `hello-elementor-parent.zip` e `ufoturismo-child.zip` para dentro desta pasta.
3. Clique com o botão direito nos arquivos `.zip` e selecione **Extrair / Unzip**.
4. No WordPress (`/wp-admin/`), ative o tema **UFOTurismo Child**.

---

### FASE 3: Envio das Mídias e Fotos do Site
1. No **Gerenciador de Arquivos da Hostinger**, entre na pasta:  
   `/public_html/wp-content/`
2. Envie o arquivo **`uploads-media-backup.zip`** e extraia (Unzip) ali mesmo para restaurar o histórico de imagens na pasta `uploads/`.

---

### FASE 4: Importação do Banco de Dados Pré-Configurado (phpMyAdmin)
1. No seu painel hPanel/cPanel da Hostinger, procure por **Bancos de Dados &rarr; phpMyAdmin** e clique no banco vinculado à sua conta WordPress.
2. Na tela inicial do phpMyAdmin, clique no botão superior **Importar (Import)**.
3. Clique em **Escolher Arquivo** e selecione nosso arquivo especial:  
   👉 **`guaraufo_production_db.sql`**
4. Role a página até o final e clique no botão verde **Executar / Importar**.
   * *Observação:* Como esse arquivo SQL foi gerado por nosso script inteligente de substituição, todo o site que rodava localmente agora responderá de maneira nativa e IMEDIATA no endereço **`https://guaraufo.adzon.com.br`**, mantendo todos os layouts, artigos e configurações intactos!

---

## ⚙️ Dicas de Performance Exclusivas para a Hostinger

1. **Versão do PHP:** Recomenda-se ajustar no painel da Hostinger para **PHP 8.2 ou 8.3** com as extensões `curl`, `simplexml` e `mbstring` ativadas para máxima fluidez do motor do feed do YouTube (`yt-rss-helper.php`).
2. **LiteSpeed Cache / Otimizador:** O ambiente Hostinger possui compatibilidade total com LiteSpeed. Ao ativar o cache na nuvem, nossa interface no estilo Netflix continuará ultra veloz, mantendo a responsividade em 1440px no desktop e dispositivos móveis!
3. **Google AdSense:** Os espaços reservados para anúncios (`.ufo-ad-placement`) aparecerão centralizados entre as seções prontos para receber o script da sua conta AdManager na Hostinger!

---

<p align="center">
  <b>Engenharia de Software Exclusiva &bull; Preparado com precisão militar por Antigravity AI</b><br>
  <i>"A Verdade Está Lá Fora... E Agora Disponível em Todo o Brasil!"</i> 🛸🇧🇷🚀
</p>
