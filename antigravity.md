# RNF-UI-001 – Padrão de Desenvolvimento com Elementor Pro (Portal UFO)

> **Diretrizes Arquiteturais e Requisitos Não Funcionais (RNF) para Antigravity & Equipe de Engenharia**
> Este documento atua como o guia canônico para qualquer intervenção, desenvolvimento e manutenção no front-end do Portal UFOTurismo PRO.

---

## Objetivo

Todo o front-end do Portal UFO deverá ser desenvolvido utilizando exclusivamente os recursos nativos do Elementor Pro, priorizando desempenho, compatibilidade, facilidade de manutenção e independência de código personalizado.

---

## Diretrizes Gerais

Toda a interface deverá ser construída utilizando:

- **Containers Flexbox do Elementor** (Flexbox Containers).
- **Containers aninhados** (Nested Containers) quando necessário.
- **Grid CSS nativo** do Elementor, quando aplicável.
- **Widgets nativos do Elementor Pro** (incluindo Widgets e Módulos PRO Customizados desenvolvidos em nossa API de Widgets).
- **Theme Builder**.
- **Loop Builder**.
- **Loop Grid**.
- **Loop Carousel**.
- **Dynamic Tags**.
- **Global Styles**.
- **Global Colors**.
- **Global Fonts**.
- **Global Templates**.
- **Template Parts**.
- **Popups Builder**.
- **Form Builder**.
- **Mega Menu** (caso disponível na versão utilizada) ou implementação compatível.

> ⚠️ **Nota de Legado:** O uso de seções e colunas legadas deverá ser evitado, salvo necessidade de compatibilidade específica.

---

## Componentização

Cada bloco da interface deverá ser desenvolvido como um componente independente e reutilizável.

### Exemplos de Módulos & Componentes:
- **Hero Banner** (Ex: *UFO Carrossel Hero de 4 Slides*)
- **Card de Notícia** (Ex: *Vitrine Notícias & Relatos*)
- **Card de Evento** (Ex: *Agenda Congressos & Encontros*)
- **Card de Relato**
- **Card de Roteiro Turístico** (Ex: *Galeria 12 Expedições Científicas*)
- **Card de Produto**
- **Card de Vídeo** (Ex: *Vitrine Vídeos Netflix com Preview On-Hover em PT-BR*)
- **Card de Podcast**
- **Card de Pesquisador**
- **Card de Parceiro**
- **Banner Publicitário** (Ex: *Zona Ad Manager / AdSense*)
- **CTA** (Ex: *Banner CTA Grupo VIP WhatsApp*)
- **FAQ**
- **Newsletter**
- **Breadcrumb**
- **Barra de Pesquisa**
- **Paginação**
- **Comentários**

### Estrutura de Cada Componente:
Cada componente deverá possuir:
- Template próprio.
- Estilos encapsulados.
- Configurações independentes e repetidores (*Repeaters*) editáveis.
- Conteúdo dinâmico.
- Compatibilidade com o **Loop Builder**.

---

## Widgets Obrigatórios do Elementor Pro

Sempre que possível, utilizar os widgets nativos e módulos estendidos do Elementor Pro, incluindo:

- Image / Image Carousel / Media Carousel / Video / Slides
- Heading / Text Editor
- Icon / Icon Box / Image Box
- Call To Action / Buttons
- Loop Grid / Loop Carousel / Posts / Portfolio / Gallery
- Form / Login / Search Form
- Nav Menu / Mega Menu
- Nested Accordion / Tabs / Toggle
- Progress Bar / Counter
- Testimonials / Star Rating
- Price Table / Price List
- Table of Contents
- Shortcode (apenas quando indispensável como fallback)
- HTML (uso excepcional e documentado)

---

## Conteúdo Dinâmico

Todo o conteúdo deverá ser alimentado dinamicamente por:

- **Custom Post Types** (`roteiros`, `eventos`, `noticias`).
- **Taxonomias**.
- **Campos personalizados** (Metaboxes originais, ACF ou solução equivalente).
- **Dynamic Tags**.
- **Dynamic Visibility** (quando aplicável).
- **Consultas personalizadas** (Query IDs) apenas quando estritamente necessário.

> 🚨 **Regra de Ouro:** Não utilizar conteúdo estático em páginas permanentes quando houver possibilidade de gerenciamento pelo painel administrativo ou construtor do Elementor PRO.

---

## Templates

Cada tipo de conteúdo deverá possuir um template específico no Theme Builder.

### Relação de Templates Obrigatórios:
- **Single Notícia & Arquivo de Notícias**
- **Single Evento & Arquivo de Eventos**
- **Single Relato & Arquivo de Relatos**
- **Single Roteiro & Arquivo de Roteiros**
- **Single Produto & Arquivo de Produtos**
- **Página de Pesquisa / Author / Categoria / Tags / 404**
- **Header Global & Footer Global**

---

## CSS

Evitar CSS personalizado ad-hoc fora do escopo do sistema de design.

### Priorizar:
- Controles nativos do Elementor.
- Variáveis Globais (Ex: `--ufo-accent-primary`, `--ufo-bg`, `--ufo-accent-sci`).
- Design Tokens.
- Classes utilitárias padronizadas no tema filho.

### Caso seja necessário CSS adicional:
- Deve ser mínimo, modular, documentado e organizado por componente.
- Nunca sobrescrever estilos internos do Elementor sem justificativa técnica robusta.

---

## JavaScript

Evitar JavaScript personalizado desconexo ou que cause bloqueio de thread.

### Sempre utilizar:
- Interações nativas do Elementor.
- Recursos e hooks event-driven do WordPress e Elementor (`frontend/element_ready/widget.default`).
- JavaScript customizado somente quando não houver alternativa (ex: motores de streaming Netflix, rolagem horizontal com setas ou pré-visualização on-hover de YouTube).
- Todo script deverá ser modular, otimizado e desacoplado via delegadores ou event-listeners autoligados.

---

## Responsividade

Todos os componentes deverão possuir configurações independentes sem necessidade de duplicação de containers para:
- **Desktop** (1440px+ e padrão)
- **Notebook** (1024px – 1366px)
- **Tablet Horizontal & Tablet Vertical** (768px – 1023px)
- **Smartphone Horizontal & Smartphone Vertical** (320px – 767px)

---

## Performance

Cada página deverá utilizar apenas os widgets estritamente necessários, mantendo a árvore DOM enxuta (baixo memory footprint).

### Evitar:
- Containers desnecessários ou aninhamentos profundos > 5 níveis.
- Widgets duplicados.
- CSS e JavaScript redundantes.

### Objetivos Mínimos de Metrologia (Lighthouse & Core Web Vitals):
- 🏆 **Google Lighthouse:** ≥ 95
- 🚀 **Core Web Vitals:** Aprovados em todas as métricas de campo e laboratório
- 📐 **CLS (Cumulative Layout Shift):** < 0,1
- ⚡ **LCP (Largest Contentful Paint):** < 2,5 s
- 🖱️ **INP (Interaction to Next Paint):** Dentro dos limites recomendados (< 200 ms)

---

## Manutenibilidade

Todo o layout deverá ser editável integralmente pelo Elementor Pro, sem necessidade de alterar arquivos PHP para ajustes visuais.

Os administradores e a equipe dev deverão conseguir via UI do Elementor PRO:
- Alterar textos, títulos, descrições e subtítulos via painel esquerdo ou edição inline.
- Alterar imagens (via WordPress Media Library ou URLs externas).
- Alterar feeds de vídeos e shortcodes modulares.
- Alterar formulários e parâmetros de botões (estilos e links).
- Alterar banners de monetização e anúncios Ad Manager / AdSense.
- Reorganizar seções arrastando os containers no construtor.
- Criar novas páginas utilizando os componentes flexbox existentes na categoria **"🛰️ UFOTurismo PRO (Módulos Flexbox)"**.
- Criar novas Landing Pages por meio de Templates e Containers reutilizáveis.

---

## Compatibilidade Futura

A arquitetura deverá permanecer compatível com futuras versões do Elementor Pro, evitando dependência de recursos experimentais que possam ser descontinuados. Sempre que possível, utilizar APIs públicas, classes estabilizadas (`\Elementor\Widget_Base`, `\Elementor\Repeater`, `Controls_Manager`) e funcionalidades oficialmente suportadas.
