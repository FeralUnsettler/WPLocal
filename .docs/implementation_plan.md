# Planejamento do Portal de Ufologia e Turismo (UFOTurismo)

Este documento detalha o planejamento arquitetural e as etapas de implementação para transformar a instalação atual do WordPress no maior e mais profissional portal do Brasil sobre Ufologia, Fenômenos Anômalos e Turismo Ufológico, alinhado com as melhores práticas de SEO, Core Web Vitals, UX/UI e alto desempenho no Google AdSense.

> [!IMPORTANT]
> Este é um projeto de altíssima escala. A implementação precisará ser modular (dividida em fases) para garantir que cada funcionalidade (Turismo, Portal de Notícias, Comunidade, Enciclopédia) seja desenvolvida com a máxima qualidade e estabilidade.

## User Review Required

Por favor, revise a divisão de fases abaixo. Como o escopo abrange desde um portal de notícias até e-commerce e rede social (comunidade), a construção modular é o caminho mais seguro. Gostaria da sua aprovação para iniciarmos pela **Fase 1 (Fundação e Portal de Notícias)**.

## Open Questions

1. **ACF Pro e Temas base:** Você possui uma licença ativa do Advanced Custom Fields Pro (ACF Pro) para usarmos na criação dos campos personalizados, ou prefere que a estrutura seja montada via código nativo do WordPress? E sobre o tema, prefere que construamos um **Tema Customizado do zero (Hello Elementor Child)** ou um **Plugin Essencial** que injete essas funções em qualquer tema?
2. **Sistema de Comunidade:** Para gamificação, perfis e ranking, você tem preferência pelo uso do **BuddyBoss/BuddyPress** integrado, ou deseja algo mais enxuto criado de forma nativa?
3. **Turismo (Peruíbe/Brasil):** As reservas e agendamentos diretos para o WhatsApp (Turismo UFO) serão apenas catálogos redirecionando para o WhatsApp, ou no futuro haverá checkout complexo de reservas (via WooCommerce Bookings)?

---

## Arquitetura Proposta

O projeto será estruturado utilizando o conceito de **Plugin de Funcionalidades Específicas** (para garantir que os dados não se percam caso o tema mude) associado a um **Tema Child (Hello Elementor)** focado 100% em performance e integração com o Elementor Pro.

### 1. Custom Post Types (CPTs) Necessários
- `noticias` (ou Posts padrão otimizados com novas taxonomias)
- `enciclopedia` (Casos famosos, Pesquisadores, Glossário)
- `eventos` (Agenda UFO)
- `relatos` (Sistema de submissão de usuários)
- `roteiros` (Turismo Ufológico por estado/cidade)
- `videos` (Integração de playlists e documentários)

### 2. Taxonomias (Filtros e Categorias)
- **Assuntos:** Exopolítica, Avistamentos, Pesquisa Científica.
- **Localização:** Estado, Cidade, País (para Relatos, Eventos e Roteiros).
- **Dificuldade/Tipo:** (Para Turismo).

### 3. Áreas Estratégicas de Monetização (AdSense / Ad Manager)
Mapeamento de *Ad placements* de alto RPM:
- **Header Banners:** Topo do site e Mega Menu.
- **In-Article:** Anúncios nativos intercalados a cada X parágrafos e Lazy-loaded.
- **Sidebar Sticky:** Banners verticais em telas de desktop.
- **Interstitials e Ancora:** Anúncios de rodapé mobile otimizados (respeitando as regras do Google).

---

## Fases de Implementação

### Fase 1: Fundação, Identidade e Portal de Notícias
* **UX/UI & Design System:** Configuração do Global Colors e Typography no Elementor baseados em *National Geographic*, *Gaia* e *History*, usando esquemas de Dark Mode, fontes modernas e UI minimalista.
* **Core Optimization:** Ajustes no `wp-config.php` e tema para segurança básica e performance.
* **Notícias e Blog:** Estruturação do layout de postagens (Hero dinâmico, biografia do autor, tempo de leitura estimado, artigos relacionados dinâmicos).
* **SEO Foundation:** Implementação de Rich Snippets (Schema `NewsArticle`, `Organization`) e otimização de Breadcrumbs.

### Fase 2: Turismo Ufológico & Eventos
* Criação dos CPTs `Roteiros` e `Eventos`.
* **Roteiros Peruíbe e Brasil:** Campos personalizados (ACF) para mapas, itens inclusos, valores e galeria de fotos.
* **Integração WhatsApp:** CTA flutuante e botões focados em conversão de Lead/Agendamento.
* **Mapas Interativos:** Exibição inicial de um mapa utilizando Leaflet ou Google Maps API com marcadores dinâmicos filtráveis.

### Fase 3: Comunidade, Relatos e Enciclopédia
* **Sistema de Relatos:** Formulários de front-end com upload restrito (PDF, imagens) enviados como rascunho (Draft) para moderação.
* **Enciclopédia:** Estrutura cruzada de dados (Ex: Relacionar um "Avistamento" na Enciclopédia com "Notícias" recentes sobre o caso).
* **Gamificação Básica:** Preparação de perfis para engajamento e aumento de tempo de tela (Pages per session).

### Fase 4: Monetização Avançada, Loja e Performance Extrema
* **WooCommerce:** Setup da loja de Souvenirs, Livros e Ingressos Premium.
* **Ad Placements System:** Desenvolvimento de blocos no Elementor para fácil injeção de tags do AdManager/AdSense nos layouts do Theme Builder.
* **Core Web Vitals:** Minificação pesada, Lazy Load nativo, otimização de banco de dados e remoção de scripts bloqueadores.

---

## Verification Plan

### Automated Tests
- Testes de velocidade usando CLI (Lighthouse local).
- Validação do Schema.org.

### Manual Verification
- Teste de contraste (Dark Mode x Acessibilidade WCAG).
- Auditoria do tempo de carregamento da Home e Página de Artigo no Mobile.
- Teste de fluxo: Submissão de um Relato simulado com aprovação no painel admin.
