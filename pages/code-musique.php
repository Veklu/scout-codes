<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#1a0a00,#3a1a08,#5a2a10);padding:48px 24px;text-align:center}
.hero h1{font-family:'Bitter',serif;font-size:2.8rem;color:#fff}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px}
.container{max-width:920px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--g);font-size:1.4rem;margin-bottom:8px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}
textarea.enc{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;margin-bottom:12px}
textarea.enc:focus{outline:none;border-color:var(--g);box-shadow:0 0 0 3px rgba(0,119,72,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-g{background:var(--g);color:#fff}.btn-g:hover{background:var(--gd)}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--g);color:var(--g)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}
.staff-output{background:#fdfcf7;border:2px solid var(--bdr);border-radius:12px;padding:20px;overflow-x:auto;min-height:120px}
.note-row{display:flex;gap:4px;align-items:end;flex-wrap:wrap;min-height:100px}
.note-sym{text-align:center;width:34px}
.note-sym .lbl{font-size:9px;color:var(--muted);margin-top:2px}
.word-gap{width:20px}
.ref-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(50px,1fr));gap:4px;margin:16px 0}
.ref-cell{background:var(--cream);border:1px solid var(--bdr);border-radius:6px;padding:4px;text-align:center;cursor:pointer;transition:0.15s}
.ref-cell:hover{border-color:var(--g);transform:translateY(-1px)}
.ref-cell .rl{font-family:'Bitter';font-size:14px;font-weight:700;color:var(--g)}
</style>
</div>
<div class="container">
<div class="card">
  <h2><?php esc_html_e('Comment ça marche?', 'scout-codes'); ?></h2>
  <p class="desc"><?php esc_html_e('Chaque lettre de l\'alphabet correspond à une note musicale. Première portée : A–M (13 notes montantes), deuxième portée : N–Z (13 notes). Les chiffres 1–9 et 0 occupent une troisième portée. Cliquez sur les lettres ou tapez votre message!', 'scout-codes'); ?></p>
  <div class="output-label"><?php esc_html_e('ALPHABET — CLIQUEZ POUR AJOUTER', 'scout-codes'); ?></div>
  <div class="ref-grid" id="refGrid"></div>
</div>
<div class="card">
  <h2>✏️ <?php esc_html_e('Encodeur', 'scout-codes'); ?></h2>
  <textarea class="enc" id="inp" placeholder="<?php echo esc_attr__('Tapez votre message...', 'scout-codes'); ?>" oninput="encode()"></textarea>
  <div class="btn-row">
    <button class="btn btn-g" onclick="encode()"><?php esc_html_e('Encoder', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="document.getElementById('inp').value='';document.getElementById('out').innerHTML=''"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="exportSVG()">📥 <?php esc_html_e('Exporter SVG', 'scout-codes'); ?></button>
  </div>
  <div class="output-label"><?php esc_html_e('PORTÉE MUSICALE', 'scout-codes'); ?></div>
  <div class="staff-output">
    <div class="note-row" id="out"></div>
  </div>
</div>
</div>

<script>
var NOTES = {};
'ABCDEFGHIJKLM'.split('').forEach(function(l,i) { NOTES[l] = {staff:1, pos:i}; });
'NOPQRSTUVWXYZ'.split('').forEach(function(l,i) { NOTES[l] = {staff:2, pos:i}; });

function drawNote(ch, size) {
  var info = NOTES[ch];
  if (!info) return '';
  var s = size || 36;
  var noteY = 68 - info.pos * 4.5;
  var staffColor = info.staff === 1 ? '#1a1a16' : '#2563eb';
  var svg = '<svg width="' + s + '" height="85" viewBox="0 0 ' + s + ' 85">';
  for (var i = 0; i < 5; i++) {
    svg += '<line x1="0" y1="' + (25 + i * 9) + '" x2="' + s + '" y2="' + (25 + i * 9) + '" stroke="#ccc" stroke-width="0.6"/>';
  }
  if (noteY > 61) {
    for (var y = 61; y <= noteY + 3; y += 9) svg += '<line x1="4" y1="' + y + '" x2="' + (s-4) + '" y2="' + y + '" stroke="#aaa" stroke-width="0.5"/>';
  }
  if (noteY < 25) {
    for (var y = 25; y >= noteY - 3; y -= 9) svg += '<line x1="4" y1="' + y + '" x2="' + (s-4) + '" y2="' + y + '" stroke="#aaa" stroke-width="0.5"/>';
  }
  svg += '<ellipse cx="' + (s/2) + '" cy="' + noteY + '" rx="5.5" ry="4" fill="' + staffColor + '" transform="rotate(-15,' + (s/2) + ',' + noteY + ')"/>';
  svg += '<line x1="' + (s/2+5) + '" y1="' + noteY + '" x2="' + (s/2+5) + '" y2="' + (noteY-22) + '" stroke="' + staffColor + '" stroke-width="1.5"/>';
  svg += '</svg>';
  return svg;
}

var refGrid = document.getElementById('refGrid');
'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').forEach(function(l) {
  var c = document.createElement('div');
  c.className = 'ref-cell';
  c.innerHTML = '<div class="rl">' + l + '</div>' + drawNote(l, 26);
  c.onclick = function() { document.getElementById('inp').value += l; encode(); };
  refGrid.appendChild(c);
});

function encode() {
  var input = document.getElementById('inp').value.toUpperCase();
  var out = document.getElementById('out');
  if (!input.trim()) { out.innerHTML = ''; return; }
  var html = '';
  for (var i = 0; i < input.length; i++) {
    var ch = input[i];
    if (ch === ' ') { html += '<div class="word-gap"></div>'; continue; }
    var svg = drawNote(ch, 34);
    if (svg) html += '<div class="note-sym">' + svg + '<div class="lbl">' + ch + '</div></div>';
  }
  out.innerHTML = html;
}

function exportSVG() {
  var svgs = document.getElementById('out').querySelectorAll('svg');
  if (!svgs.length) return;
  var gap = 40, W = svgs.length * gap + 20;
  var inner = '';
  var x = 10;
  svgs.forEach(function(svg) {
    inner += '<g transform="translate(' + x + ',5)">' + svg.innerHTML + '</g>';
    x += gap;
  });
  var full = '<svg xmlns="http://www.w3.org/2000/svg" width="' + W + '" height="95" viewBox="0 0 ' + W + ' 95">' + inner + '</svg>';
  var a = document.createElement('a');
  a.href = URL.createObjectURL(new Blob([full], {type: 'image/svg+xml'}));
  a.download = 'message-musique.svg';
  a.click();
}
</script>