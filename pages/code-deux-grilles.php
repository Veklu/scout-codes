<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}

.hero{background:linear-gradient(160deg,#1a0e00 0%,#3d2200 40%,#6b3a00 100%);padding:48px 24px 40px;text-align:center;position:relative;overflow:hidden}
.hero::before{content:'';position:absolute;top:0;left:0;right:0;bottom:0;background:url("data:image/svg+xml,%3Csvg width='60' height='60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20 0v60M40 0v60M0 20h60M0 40h60' stroke='rgba(212,160,23,0.06)' stroke-width='1' fill='none'/%3E%3C/svg%3E")}
.hero h1{font-family:'Bitter',serif;font-size:2.6rem;color:#fff;position:relative}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.65);margin-top:8px;position:relative}
.hero .page-ref{display:inline-block;background:rgba(255,255,255,0.1);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px;position:relative}

.container{max-width:900px;margin:0 auto;padding:24px 16px}

/* Cards */
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--g);font-size:1.4rem;margin-bottom:6px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px}

/* Reference grids */
.ref-layout{display:flex;gap:32px;flex-wrap:wrap;justify-content:center;margin-bottom:24px}
.ref-grid{display:grid;grid-template-columns:repeat(3,1fr);border:3px solid var(--txt);border-radius:2px;overflow:hidden}
.ref-cell{width:88px;height:88px;display:flex;flex-direction:column;align-items:center;justify-content:center;border:1px solid var(--bdr);background:var(--cream);transition:0.15s;cursor:pointer;position:relative}
.ref-cell:hover{background:#e8f5ee;z-index:1;transform:scale(1.05);box-shadow:0 4px 12px rgba(0,0,0,0.1)}
.ref-cell .letters{font-family:'Bitter',serif;font-size:15px;font-weight:700;color:var(--g)}
.ref-cell .symbol{margin-top:4px}

.x-grid{position:relative;width:200px;height:200px}
.x-cell{position:absolute;display:flex;flex-direction:column;align-items:center;justify-content:center;cursor:pointer;transition:0.15s;border-radius:4px;padding:8px}
.x-cell:hover{background:rgba(0,119,72,0.1)}
.x-cell .letters{font-family:'Bitter',serif;font-size:14px;font-weight:700;color:var(--g)}

/* Encoder */
.encoder-input{display:flex;gap:12px;margin-bottom:16px;flex-wrap:wrap}
.encoder-input textarea{flex:1;min-width:200px;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;transition:0.2s}
.encoder-input textarea:focus{outline:none;border-color:var(--g);box-shadow:0 0 0 3px rgba(0,119,72,0.12)}

.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-g{background:var(--g);color:#fff}.btn-g:hover{background:var(--gd)}
.btn-gold{background:var(--gold);color:#fff}.btn-gold:hover{background:#b8890f}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--g);color:var(--g)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}

/* Output SVG area */
.output-area{background:#fdfcf7;border:2px dashed var(--bdr);border-radius:12px;padding:20px;min-height:100px;display:flex;flex-wrap:wrap;gap:6px;align-items:center;position:relative}
.output-area.active{border-color:var(--g);border-style:solid}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}
.word-gap{width:20px;height:50px}
.placeholder{color:var(--bdr);font-size:14px;font-style:italic;width:100%;text-align:center;padding:20px}

/* Alphabet reference small */
.alpha-small{display:grid;grid-template-columns:repeat(auto-fill,minmax(64px,1fr));gap:6px;margin-top:16px}
.alpha-sm{background:var(--cream);border:1px solid var(--bdr);border-radius:8px;padding:6px 4px;text-align:center;cursor:pointer;transition:0.15s}
.alpha-sm:hover{border-color:var(--g);transform:translateY(-1px)}
.alpha-sm .l{font-weight:800;color:var(--g);font-size:14px}

/* Example */
.example{background:linear-gradient(135deg,#f8f0e0,var(--cream));border:1px solid #e0d4b8;border-radius:12px;padding:20px;margin:20px 0}
.example h3{color:#6b3a00;font-size:1rem;margin-bottom:8px}
.example-symbols{display:flex;gap:4px;flex-wrap:wrap;align-items:center;margin-top:12px}

@media(max-width:600px){
  .hero h1{font-size:1.8rem}
  .ref-cell{width:68px;height:68px}
  .ref-cell .letters{font-size:12px}
  .ref-layout{gap:16px}
}
</style>
</div>

<div class="container">

<!-- EXPLANATION -->
<div class="card">
  <h2><?php esc_html_e('Comment ça marche?', 'scout-codes'); ?></h2>
  <p class="desc"><?php echo wp_kses(__('Les 26 lettres sont réparties dans deux grilles en # (3×3) et un X. Chaque lettre est représentée par la <strong>forme de son compartiment</strong> dans la grille, plus des <strong>points</strong> pour sa position (1er = aucun point, 2e = 1 point, 3e = 2 points).', 'scout-codes'), ['strong' => []]); ?></p>

  <div class="ref-layout">
    <!-- Grid 1: no dots -->
    <div>
      <div style="text-align:center;font-weight:700;color:var(--g);margin-bottom:8px;font-size:13px"><?php esc_html_e('Grille # (sans point)', 'scout-codes'); ?></div>
      <div class="ref-grid" id="grid1"></div>
    </div>
    <!-- Grid 2: with dots -->
    <div>
      <div style="text-align:center;font-weight:700;color:var(--g);margin-bottom:8px;font-size:13px"><?php esc_html_e('Grille # (avec point)', 'scout-codes'); ?></div>
      <div class="ref-grid" id="grid2"></div>
    </div>
    <!-- X grid -->
    <div>
      <div style="text-align:center;font-weight:700;color:var(--g);margin-bottom:8px;font-size:13px"><?php esc_html_e('Grille X', 'scout-codes'); ?></div>
      <div class="x-grid" id="xGrid">
        <svg width="200" height="200" style="position:absolute;top:0;left:0">
          <line x1="0" y1="0" x2="200" y2="200" stroke="var(--txt)" stroke-width="3"/>
          <line x1="200" y1="0" x2="0" y2="200" stroke="var(--txt)" stroke-width="3"/>
        </svg>
      </div>
    </div>
  </div>

  <div class="example">
    <h3>📝 <?php esc_html_e('Exemple: MIEUX', 'scout-codes'); ?></h3>
    <p><?php esc_html_e('M = grille 2, centre-gauche (avec point) · I = grille 1, bas-droite · E = grille 1, centre-centre · U = grille 2, bas-centre · X = grille X, droite (avec point)', 'scout-codes'); ?></p>
    <div class="example-symbols" id="exampleMieux"></div>
  </div>
</div>

<!-- INTERACTIVE ENCODER -->
<div class="card">
  <h2>✏️ <?php esc_html_e('Créez votre message secret', 'scout-codes'); ?></h2>
  <p class="desc"><?php esc_html_e('Tapez du texte ou cliquez sur les lettres ci-dessous pour générer les symboles Deux Grilles.', 'scout-codes'); ?></p>

  <div class="encoder-input">
    <textarea id="inputText" placeholder="<?php echo esc_attr__('Tapez votre message ici...', 'scout-codes'); ?>" oninput="encode()"></textarea>
  </div>
  <div class="btn-row">
    <button class="btn btn-g" onclick="encode()"><?php esc_html_e('Encoder', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="clearAll()"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="downloadSVG()">📥 <?php esc_html_e('Télécharger SVG', 'scout-codes'); ?></button>
  </div>

  <div class="output-label"><?php esc_html_e('MESSAGE ENCODÉ', 'scout-codes'); ?></div>
  <div class="output-area" id="output"><div class="placeholder"><?php esc_html_e('Votre message apparaîtra ici en symboles...', 'scout-codes'); ?></div></div>

  <div style="margin-top:20px">
    <div class="output-label"><?php esc_html_e('CLIQUEZ POUR AJOUTER', 'scout-codes'); ?></div>
    <div class="alpha-small" id="alphaClickGrid"></div>
  </div>
</div>

<!-- DECODER -->
<div class="card">
  <h2>🔍 <?php esc_html_e('Décodeur', 'scout-codes'); ?></h2>
  <p class="desc"><?php esc_html_e('Entrez le texte encodé en lettres et voyez le résultat — ou utilisez l\'encodeur ci-dessus et lisez les lettres sous chaque symbole.', 'scout-codes'); ?></p>
</div>

</div>



<script>var scL10n = <?php echo wp_json_encode([
  'messageApparaitra' => __('Votre message apparaîtra ici en symboles...', 'scout-codes'),
]); ?>;</script>
<script>
// Pigpen cipher mapping
// Grid 1 (no dots): A-I, Grid 2 (dots): J-R, X grid: S-Z
// Each cell has a shape (SVG path) and number of dots

const PIGPEN = {};

// Grid 1 positions (row, col) for A-I
const G1 = [
  {l:'A',r:0,c:0,dots:0},{l:'B',r:0,c:1,dots:0},{l:'C',r:0,c:2,dots:0},
  {l:'D',r:1,c:0,dots:0},{l:'E',r:1,c:1,dots:0},{l:'F',r:1,c:2,dots:0},
  {l:'G',r:2,c:0,dots:0},{l:'H',r:2,c:1,dots:0},{l:'I',r:2,c:2,dots:0},
];
// Grid 2 positions (dots) for J-R
const G2 = [
  {l:'J',r:0,c:0,dots:1},{l:'K',r:0,c:1,dots:1},{l:'L',r:0,c:2,dots:1},
  {l:'M',r:1,c:0,dots:1},{l:'N',r:1,c:1,dots:1},{l:'O',r:1,c:2,dots:1},
  {l:'P',r:2,c:0,dots:1},{l:'Q',r:2,c:1,dots:1},{l:'R',r:2,c:2,dots:1},
];

// For a 3x3 grid, each cell has walls: top, right, bottom, left
// We draw only the walls that exist based on position
function getGridWalls(r, c) {
  return {
    top:    r > 0,
    right:  c < 2,
    bottom: r < 2,
    left:   c > 0,
  };
}

function drawGridSymbol(r, c, dots, size) {
  const s = size || 40;
  const m = 4; // margin
  const w = getGridWalls(r, c);
  const stroke = '#1a1a16';
  const sw = 2.5;

  let paths = '';
  if (w.top)    paths += `<line x1="${m}" y1="${m}" x2="${s-m}" y2="${m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
  if (w.bottom) paths += `<line x1="${m}" y1="${s-m}" x2="${s-m}" y2="${s-m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
  if (w.left)   paths += `<line x1="${m}" y1="${m}" x2="${m}" y2="${s-m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
  if (w.right)  paths += `<line x1="${s-m}" y1="${m}" x2="${s-m}" y2="${s-m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;

  if (dots >= 1) {
    paths += `<circle cx="${s/2}" cy="${s/2}" r="3" fill="${stroke}"/>`;
  }

  return `<svg width="${s}" height="${s}" viewBox="0 0 ${s} ${s}">${paths}</svg>`;
}

// X grid: S,T (top), U,V (left), W,X (right), Y,Z (bottom)
// S/T = top triangle, U/V = left, W/X = right, Y/Z = bottom
const XMAP = [
  {l:'S',pos:'top',dots:0},{l:'T',pos:'top',dots:1},
  {l:'U',pos:'left',dots:0},{l:'V',pos:'left',dots:1},
  {l:'W',pos:'right',dots:0},{l:'X',pos:'right',dots:1},
  {l:'Y',pos:'bottom',dots:0},{l:'Z',pos:'bottom',dots:1},
];

function drawXSymbol(pos, dots, size) {
  const s = size || 40;
  const m = 4;
  const stroke = '#1a1a16';
  const sw = 2.5;
  const mid = s/2;

  let paths = '';
  switch(pos) {
    case 'top':
      paths += `<line x1="${m}" y1="${s-m}" x2="${mid}" y2="${m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
      paths += `<line x1="${s-m}" y1="${s-m}" x2="${mid}" y2="${m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
      break;
    case 'bottom':
      paths += `<line x1="${m}" y1="${m}" x2="${mid}" y2="${s-m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
      paths += `<line x1="${s-m}" y1="${m}" x2="${mid}" y2="${s-m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
      break;
    case 'left':
      paths += `<line x1="${s-m}" y1="${m}" x2="${m}" y2="${mid}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
      paths += `<line x1="${s-m}" y1="${s-m}" x2="${m}" y2="${mid}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
      break;
    case 'right':
      paths += `<line x1="${m}" y1="${m}" x2="${s-m}" y2="${mid}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
      paths += `<line x1="${m}" y1="${s-m}" x2="${s-m}" y2="${mid}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
      break;
  }

  if (dots >= 1) {
    paths += `<circle cx="${mid}" cy="${mid}" r="3" fill="${stroke}"/>`;
  }

  return `<svg width="${s}" height="${s}" viewBox="0 0 ${s} ${s}">${paths}</svg>`;
}

// Build the full lookup
function getSymbolSVG(letter, size) {
  const ch = letter.toUpperCase();
  const g1 = G1.find(x => x.l === ch);
  if (g1) return drawGridSymbol(g1.r, g1.c, g1.dots, size);

  const g2 = G2.find(x => x.l === ch);
  if (g2) return drawGridSymbol(g2.r, g2.c, g2.dots, size);

  const xm = XMAP.find(x => x.l === ch);
  if (xm) return drawXSymbol(xm.pos, xm.dots, size);

  return '';
}

// Build reference grids
function buildRefGrids() {
  const grid1 = document.getElementById('grid1');
  const grid2 = document.getElementById('grid2');

  for (const item of G1) {
    const cell = document.createElement('div');
    cell.className = 'ref-cell';
    cell.innerHTML = `<div class="letters">${item.l}</div><div class="symbol">${drawGridSymbol(item.r, item.c, item.dots, 36)}</div>`;
    cell.onclick = () => addLetter(item.l);
    grid1.appendChild(cell);
  }

  for (const item of G2) {
    const cell = document.createElement('div');
    cell.className = 'ref-cell';
    cell.innerHTML = `<div class="letters">${item.l} •</div><div class="symbol">${drawGridSymbol(item.r, item.c, item.dots, 36)}</div>`;
    cell.onclick = () => addLetter(item.l);
    grid2.appendChild(cell);
  }

  // X grid cells
  const xGrid = document.getElementById('xGrid');
  const positions = {
    top:    {x:70, y:15},
    left:   {x:10, y:75},
    right:  {x:130, y:75},
    bottom: {x:70, y:140},
  };

  for (const item of XMAP) {
    const cell = document.createElement('div');
    cell.className = 'x-cell';
    cell.style.left = positions[item.pos].x + 'px';
    cell.style.top = positions[item.pos].y + 'px';
    cell.innerHTML = `<div class="letters">${item.l}${item.dots ? ' •' : ''}</div><div class="symbol">${drawXSymbol(item.pos, item.dots, 32)}</div>`;
    cell.onclick = () => addLetter(item.l);
    xGrid.appendChild(cell);
  }
}

// Build small click grid
function buildClickGrid() {
  const grid = document.getElementById('alphaClickGrid');
  for (let i = 65; i <= 90; i++) {
    const ch = String.fromCharCode(i);
    const card = document.createElement('div');
    card.className = 'alpha-sm';
    card.innerHTML = `<div class="l">${ch}</div>${getSymbolSVG(ch, 28)}`;
    card.onclick = () => addLetter(ch);
    grid.appendChild(card);
  }
  // Space button
  const sp = document.createElement('div');
  sp.className = 'alpha-sm';
  sp.innerHTML = '<div class="l" style="font-size:11px">ESP</div>';
  sp.onclick = () => { document.getElementById('inputText').value += ' '; encode(); };
  grid.appendChild(sp);
}

function addLetter(ch) {
  const ta = document.getElementById('inputText');
  ta.value += ch;
  encode();
}

function encode() {
  const input = document.getElementById('inputText').value.toUpperCase();
  const output = document.getElementById('output');

  if (!input.trim()) {
    output.innerHTML = '<div class="placeholder">' + scL10n.messageApparaitra + '</div>';
    output.classList.remove('active');
    return;
  }

  output.classList.add('active');
  let html = '';

  for (const ch of input) {
    if (ch === ' ') {
      html += '<div class="word-gap"></div>';
    } else {
      const svg = getSymbolSVG(ch, 48);
      if (svg) {
        html += `<div style="text-align:center">${svg}<div style="font-size:10px;color:var(--muted);margin-top:-2px">${ch}</div></div>`;
      }
    }
  }

  output.innerHTML = html;
}

function clearAll() {
  document.getElementById('inputText').value = '';
  document.getElementById('output').innerHTML = '<div class="placeholder">' + scL10n.messageApparaitra + '</div>';
  document.getElementById('output').classList.remove('active');
}

function downloadSVG() {
  const output = document.getElementById('output');
  const svgs = output.querySelectorAll('svg');
  if (!svgs.length) return;

  const W = svgs.length * 54 + 20;
  let inner = '';
  let x = 10;
  svgs.forEach(svg => {
    inner += `<g transform="translate(${x},10)">${svg.innerHTML}</g>`;
    x += 54;
  });

  const full = `<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="68" viewBox="0 0 ${W} 68">${inner}</svg>`;
  const blob = new Blob([full], {type:'image/svg+xml'});
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url; a.download = 'message-tictactoc.svg'; a.click();
  URL.revokeObjectURL(url);
}

// Example: MIEUX
function buildExample() {
  const box = document.getElementById('exampleMieux');
  for (const ch of 'MIEUX') {
    box.innerHTML += `<div style="text-align:center">${getSymbolSVG(ch, 44)}<div style="font-size:11px;color:var(--muted)">${ch}</div></div>`;
  }
}

buildRefGrids();
buildClickGrid();
buildExample();
</script>