<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc;--red:#c41e3a}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#1a0008,#3a0018,#6a0028);padding:48px 24px 40px;text-align:center;position:relative}
.hero h1{font-family:'Bitter',serif;font-size:2.6rem;color:#fff;position:relative}
.hero h1 span{color:var(--red)}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px;position:relative}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px;position:relative}
.container{max-width:920px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--red);font-size:1.4rem;margin-bottom:6px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}

.alpha-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(80px,1fr));gap:6px;margin:16px 0}
.alpha-card{background:var(--cream);border:1.5px solid var(--bdr);border-radius:10px;padding:6px;text-align:center;cursor:pointer;transition:0.15s}
.alpha-card:hover{border-color:var(--red);transform:translateY(-2px);box-shadow:0 4px 12px rgba(196,30,58,0.1)}
.alpha-card .ltr{font-family:'Bitter',serif;font-size:18px;font-weight:900;color:var(--red)}
.alpha-card .code{font-family:'JetBrains Mono';font-size:10px;color:var(--muted);margin-top:1px}

.dir-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:16px;border:1px solid var(--bdr)}
.dir-toggle button{flex:1;padding:8px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:12px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.dir-toggle button.active{background:var(--red);color:#fff}
.encoder-input textarea{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;transition:0.2s;margin-bottom:12px}
.encoder-input textarea:focus{outline:none;border-color:var(--red);box-shadow:0 0 0 3px rgba(196,30,58,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-r{background:var(--red);color:#fff}.btn-r:hover{background:#a01830}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--red);color:var(--red)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-area{background:#fdfcf7;border:2px dashed var(--bdr);border-radius:12px;padding:20px;min-height:80px;display:flex;flex-wrap:wrap;gap:8px;align-items:center}
.output-area.active{border-color:var(--red);border-style:solid}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}
.word-gap{width:20px;height:50px}
.sep-mark{font-size:28px;color:var(--red);font-weight:900;display:flex;align-items:center;font-family:'Bitter'}
.placeholder{color:var(--bdr);font-size:14px;font-style:italic;width:100%;text-align:center;padding:20px}
.sym-wrap{text-align:center}
.sym-wrap .lbl{font-size:10px;color:var(--muted);margin-top:-2px}

.legend{background:linear-gradient(135deg,#fff5f8,var(--cream));border:1px solid #f0c0cc;border-radius:12px;padding:20px;margin:16px 0;font-size:0.9rem;color:var(--soft);line-height:1.8}
.legend strong{color:var(--red)}
.example{background:var(--cream);border:1px solid var(--bdr);border-radius:12px;padding:20px;margin-top:20px}
.example strong{color:var(--red)}
.example-row{display:flex;gap:8px;flex-wrap:wrap;align-items:center;margin-top:12px}
.vs-box{background:#fff;border:2px solid var(--bdr);border-radius:12px;padding:20px;margin:20px 0;display:flex;gap:24px;align-items:center;justify-content:center;flex-wrap:wrap}
.vs-box .side{text-align:center}
.vs-box .side h4{font-size:12px;color:var(--muted);margin-bottom:6px}
.vs-box .vs{font-family:'Bitter';font-size:24px;color:var(--bdr);font-weight:900}

@media(max-width:600px){.hero h1{font-size:1.8rem}.alpha-grid{grid-template-columns:repeat(auto-fill,minmax(65px,1fr))}}
</style>
</div>

<div class="container">

<div class="card">
  <h2>Comment ça marche?</h2>
  <p class="desc">Le Code Chinois est <strong>l'inverse du Code des Samouraïs</strong>. On commence la lecture par les traits <strong>horizontaux</strong> (qui représentent la voyelle), puis les traits <strong>verticaux</strong> (qui avancent dans l'alphabet).</p>

  <div class="legend">
    <strong>Voyelles = traits horizontaux :</strong> A=1H, E=2H, I=3H, O=4H, U=5H, Y=6H<br>
    <strong>Consonnes = voyelle horizontale + traits verticaux</strong><br>
    <strong>Séparateurs :</strong> \ sépare les mots · \\ sépare les phrases<br><br>
    ⚠️ Attention: c'est <strong>exactement l'inverse</strong> du Samouraï!
  </div>

  <!-- Comparison -->
  <div class="vs-box">
    <div class="side">
      <h4>SAMOURAÏ</h4>
      <p style="font-size:13px;color:var(--soft)">Verticaux d'abord → Horizontaux</p>
      <div id="samC" style="margin-top:8px"></div>
      <div style="font-size:11px;color:var(--muted)">C = 1V+2H</div>
    </div>
    <div class="vs">VS</div>
    <div class="side">
      <h4>CHINOIS</h4>
      <p style="font-size:13px;color:var(--soft)">Horizontaux d'abord → Verticaux</p>
      <div id="chiC" style="margin-top:8px"></div>
      <div style="font-size:11px;color:var(--muted)">C = 1H+2V</div>
    </div>
  </div>

  <div class="alpha-grid" id="alphaGrid"></div>

  <div class="example">
    <strong>Séparateurs</strong><br>
    Utilisez <strong>\</strong> pour séparer les mots et <strong>\\</strong> pour séparer les phrases.
  </div>
</div>

<!-- ENCODER -->
<div class="card">
  <h2>✏️ Encodeur / Décodeur</h2>

  <div class="dir-toggle">
    <button class="active" onclick="setDir('encode',this)">Texte → Chinois</button>
    <button onclick="setDir('decode',this)">Chinois → Texte</button>
  </div>

  <div class="encoder-input">
    <textarea id="inputText" placeholder="Tapez votre message ici..." oninput="convert()"></textarea>
  </div>
  <div class="btn-row">
    <button class="btn btn-r" onclick="convert()">Convertir</button>
    <button class="btn btn-o" onclick="clearAll()">Effacer</button>
    <button class="btn btn-o" onclick="downloadSVG()">📥 SVG</button>
  </div>

  <div class="output-label" id="outLabel">SYMBOLES CHINOIS</div>
  <div class="output-area" id="output"><div class="placeholder">Votre message apparaîtra ici...</div></div>
</div>
</div>



<script>
// Chinois: INVERSE of Samouraï
// H = vowel group, V = offset (consonant position)
const MAP = {
  A:{h:1,v:0}, B:{h:1,v:1}, C:{h:1,v:2}, D:{h:1,v:3},
  E:{h:2,v:0}, F:{h:2,v:1}, G:{h:2,v:2}, H:{h:2,v:3},
  I:{h:3,v:0}, J:{h:3,v:1}, K:{h:3,v:2}, L:{h:3,v:3}, M:{h:3,v:4}, N:{h:3,v:5},
  O:{h:4,v:0}, P:{h:4,v:1}, Q:{h:4,v:2}, R:{h:4,v:3}, S:{h:4,v:4}, T:{h:4,v:5},
  U:{h:5,v:0}, V:{h:5,v:1}, W:{h:5,v:2}, X:{h:5,v:3},
  Y:{h:6,v:0}, Z:{h:6,v:1},
};
const REV = {};
for (const [l, {h, v}] of Object.entries(MAP)) REV[`${h},${v}`] = l;

let dir = 'encode';

function codeStr(l) {
  const m = MAP[l];
  if (m.v === 0) return `${m.h}H`;
  return `${m.h}H+${m.v}V`;
}

function drawSymbol(letter, size, isSam) {
  const m = MAP[letter.toUpperCase()];
  if (!m) return '';
  const s = size || 50;
  const pad = 6;
  const hCount = isSam ? m.v : m.h;  // horizontal lines
  const vCount = isSam ? m.h : m.v;  // vertical lines
  // Wait: for Chinois, h=horizontal (vowel), v=vertical (offset)
  // Drawing: horizontal lines ARE horizontal, vertical ARE vertical
  // So we draw m.h horizontal lines and m.v vertical lines
  const realH = m.h;
  const realV = m.v;

  let d = '';

  // Horizontal lines (red — the vowel)
  if (realH > 0) {
    const hSpacing = (s - 2 * pad) / (realH + 1);
    for (let i = 0; i < realH; i++) {
      const y = pad + hSpacing * (i + 1);
      d += `<line x1="${pad}" y1="${y}" x2="${s - pad}" y2="${y}" stroke="#c41e3a" stroke-width="2.5" stroke-linecap="round"/>`;
    }
  }

  // Vertical lines (dark — the consonant offset)
  if (realV > 0) {
    const vSpacing = (s - 2 * pad) / (realV + 1);
    for (let i = 0; i < realV; i++) {
      const x = pad + vSpacing * (i + 1);
      d += `<line x1="${x}" y1="${pad}" x2="${x}" y2="${s - pad}" stroke="#1a1a16" stroke-width="2" stroke-linecap="round"/>`;
    }
  }

  return `<svg width="${s}" height="${s}" viewBox="0 0 ${s} ${s}">${d}</svg>`;
}

// Samouraï version for comparison (inverted: v=vowel drawn vertical, h=offset drawn horizontal)
function drawSamSymbol(letter, size) {
  const m = MAP[letter.toUpperCase()];
  if (!m) return '';
  const s = size || 50;
  const pad = 6;
  // Samourai: vertical=vowel, horizontal=offset
  // But the mapping is same letters, just reading is different
  // For Samourai C: v=1 h=2 means 1 vertical line, 2 horizontal
  const realV = m.h; // vowel = h value (1 for A group) drawn as vertical
  const realH = m.v; // offset drawn as horizontal

  let d = '';
  if (realV > 0) {
    const vSpacing = (s - 2 * pad) / (realV + 1);
    for (let i = 0; i < realV; i++) {
      const x = pad + vSpacing * (i + 1);
      d += `<line x1="${x}" y1="${pad}" x2="${x}" y2="${s - pad}" stroke="#8b1a1a" stroke-width="2.5" stroke-linecap="round"/>`;
    }
  }
  if (realH > 0) {
    const hSpacing = (s - 2 * pad) / (realH + 1);
    for (let i = 0; i < realH; i++) {
      const y = pad + hSpacing * (i + 1);
      d += `<line x1="${pad}" y1="${y}" x2="${s - pad}" y2="${y}" stroke="#1a1a16" stroke-width="2" stroke-linecap="round"/>`;
    }
  }
  return `<svg width="${s}" height="${s}" viewBox="0 0 ${s} ${s}">${d}</svg>`;
}

function setDir(d, btn) {
  dir = d;
  document.querySelectorAll('.dir-toggle button').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('inputText').placeholder = d === 'encode' ? 'Tapez votre message ici...' : 'Entrez le code (ex: 1H+2V 2H+3V) séparé par espaces...';
  document.getElementById('outLabel').textContent = d === 'encode' ? 'SYMBOLES CHINOIS' : 'TEXTE';
  convert();
}

function convert() {
  const input = document.getElementById('inputText').value;
  const o = document.getElementById('output');
  if (!input.trim()) { o.innerHTML = '<div class="placeholder">Votre message apparaîtra ici...</div>'; o.classList.remove('active'); return; }
  o.classList.add('active');

  if (dir === 'encode') {
    let html = '';
    for (const ch of input.toUpperCase()) {
      if (ch === ' ') { html += '<div class="sep-mark">\\</div>'; continue; }
      const svg = drawSymbol(ch, 50);
      if (svg) html += `<div class="sym-wrap">${svg}<div class="lbl">${ch}</div></div>`;
    }
    o.innerHTML = html;
  } else {
    const parts = input.trim().split(/[\s,]+/);
    let result = '';
    for (const p of parts) {
      if (p === '\\' || p === '/') { result += ' '; continue; }
      let h = 0, v = 0;
      const m1 = p.match(/(\d+)\s*H\s*\+?\s*(\d+)\s*V/i);
      const m2 = p.match(/(\d+)\s*H/i);
      if (m1) { h = parseInt(m1[1]); v = parseInt(m1[2]); }
      else if (m2) { h = parseInt(m2[1]); v = 0; }
      result += REV[`${h},${v}`] || '?';
    }
    o.innerHTML = `<div style="font-family:'JetBrains Mono';font-size:24px;color:#c41e3a;letter-spacing:4px">${result}</div>`;
  }
}

function clearAll() { document.getElementById('inputText').value = ''; const o = document.getElementById('output'); o.innerHTML = '<div class="placeholder">Votre message apparaîtra ici...</div>'; o.classList.remove('active'); }

function downloadSVG() {
  const svgs = document.getElementById('output').querySelectorAll('svg');
  if (!svgs.length) return;
  const gap = 56, W = svgs.length * gap + 20; let inner = '', x = 10;
  svgs.forEach(svg => { inner += `<g transform="translate(${x},10)">${svg.innerHTML}</g>`; x += gap; });
  const a = document.createElement('a');
  a.href = URL.createObjectURL(new Blob([`<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="70" viewBox="0 0 ${W} 70">${inner}</svg>`], { type: 'image/svg+xml' }));
  a.download = 'message-chinois.svg'; a.click();
}

function addLetter(ch) { document.getElementById('inputText').value += ch; convert(); }

// Build grid
const grid = document.getElementById('alphaGrid');
'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').forEach(l => {
  const c = document.createElement('div');
  c.className = 'alpha-card';
  c.innerHTML = `<div class="ltr">${l}</div>${drawSymbol(l, 36)}<div class="code">${codeStr(l)}</div>`;
  c.onclick = () => addLetter(l);
  grid.appendChild(c);
});

// Comparison SVGs
document.getElementById('samC').innerHTML = drawSamSymbol('C', 60);
document.getElementById('chiC').innerHTML = drawSymbol('C', 60);
</script>