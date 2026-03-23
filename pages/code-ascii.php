<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc;--blue:#2563eb}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#0a0a1e,#1a1a3e,#2a2a5e);padding:48px 24px;text-align:center}
.hero h1{font-family:'Bitter',serif;font-size:2.8rem;color:#fff}
.hero h1 span{color:#6ea8ff}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px}
.container{max-width:920px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--blue);font-size:1.4rem;margin-bottom:8px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}
textarea.enc{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;margin-bottom:12px}
textarea.enc:focus{outline:none;border-color:var(--blue);box-shadow:0 0 0 3px rgba(37,99,235,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-b{background:var(--blue);color:#fff}.btn-b:hover{background:#1d4ed8}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--blue);color:var(--blue)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}
.output-box{background:#0a0a1e;border-radius:12px;padding:20px 24px;min-height:60px;font-family:'JetBrains Mono';font-size:16px;color:#6ea8ff;letter-spacing:2px;line-height:2;word-break:break-all}
.mode-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:16px;border:1px solid var(--bdr)}
.mode-toggle button{flex:1;padding:10px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:13px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.mode-toggle button.active{background:var(--blue);color:#fff}

/* ASCII TABLE — proper grid */
.ascii-header{display:grid;grid-template-columns:40px 50px 40px 1fr;gap:4px;padding:6px 8px;font-family:'JetBrains Mono';font-size:11px;font-weight:700;color:var(--muted);text-transform:uppercase;border-bottom:2px solid var(--bdr)}
.ascii-table{display:grid;grid-template-columns:1fr 1fr;gap:4px;margin:8px 0 20px;max-height:400px;overflow-y:auto}
.ascii-row{display:grid;grid-template-columns:40px 50px 40px 1fr;gap:4px;padding:5px 8px;background:var(--cream);border-radius:6px;align-items:center;cursor:pointer;transition:0.15s;border:1px solid transparent;font-family:'JetBrains Mono';font-size:12px}
.ascii-row:hover{border-color:var(--blue);background:#e8f0ff}
.ascii-row .ch{font-weight:800;color:var(--blue);font-size:15px}
.ascii-row .dec{color:var(--soft)}
.ascii-row .hex{color:var(--gold)}
.ascii-row .bin{color:var(--muted);font-size:10px;letter-spacing:0.5px}

@media(max-width:600px){.hero h1{font-size:1.8rem}.ascii-table{grid-template-columns:1fr}}
</style>
</div>
<div class="container">
<div class="card">
  <h2><?php esc_html_e('Table ASCII', 'scout-codes'); ?></h2>
  <p class="desc"><?php echo wp_kses(__('Ce code est utilisé en informatique. Chaque lettre a une valeur en <strong>décimal</strong> (DEC), <strong>hexadécimal</strong> (HEX) et <strong>binaire</strong> (BIN). Cliquez sur un caractère pour l\'ajouter à votre message.', 'scout-codes'), ['strong' => []]); ?></p>
  <div class="ascii-table" id="asciiTable"></div>
</div>
<div class="card">
  <h2>✏️ <?php esc_html_e('Encodeur', 'scout-codes'); ?></h2>
  <textarea class="enc" id="inp" placeholder="<?php echo esc_attr__('Tapez votre message...', 'scout-codes'); ?>" oninput="encode()"></textarea>
  <div class="mode-toggle" id="modeToggle">
    <button class="active" data-mode="dec"><?php esc_html_e('Décimal', 'scout-codes'); ?></button>
    <button data-mode="hex"><?php esc_html_e('Hexadécimal', 'scout-codes'); ?></button>
    <button data-mode="bin"><?php esc_html_e('Binaire', 'scout-codes'); ?></button>
  </div>
  <div class="btn-row">
    <button class="btn btn-b" onclick="encode()"><?php esc_html_e('Encoder', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="document.getElementById('inp').value='';document.getElementById('out').textContent=''"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
    <button class="btn btn-o" id="copyBtn" onclick="copyOut()">📋 <?php esc_html_e('Copier', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="exportTxt()">💾 <?php esc_html_e('Exporter .txt', 'scout-codes'); ?></button>
  </div>
  <div class="output-label" id="outLabel"><?php esc_html_e('DÉCIMAL', 'scout-codes'); ?></div>
  <div class="output-box" id="out"></div>
</div>
</div>

<script>var scL10n = <?php echo wp_json_encode([
  'decimal' => __('DÉCIMAL', 'scout-codes'),
  'hexadecimal' => __('HEXADÉCIMAL', 'scout-codes'),
  'binaire' => __('BINAIRE', 'scout-codes'),
  'copie' => __('Copié!', 'scout-codes'),
  'copier' => __('Copier', 'scout-codes'),
  'original' => __('Original:', 'scout-codes'),
  'encode' => __('Encodé:', 'scout-codes'),
]); ?>;</script>
<script>
var mode = 'dec';

document.getElementById('modeToggle').addEventListener('click', function(e) {
  var btn = e.target.closest('button');
  if (!btn) return;
  mode = btn.dataset.mode;
  this.querySelectorAll('button').forEach(function(b) { b.classList.remove('active'); });
  btn.classList.add('active');
  encode();
});

function encode() {
  var input = document.getElementById('inp').value.toUpperCase();
  var out = document.getElementById('out');
  var label = document.getElementById('outLabel');
  label.textContent = mode === 'dec' ? scL10n.decimal : mode === 'hex' ? scL10n.hexadecimal : scL10n.binaire;
  if (!input.trim()) { out.textContent = ''; return; }
  var parts = [];
  for (var i = 0; i < input.length; i++) {
    var ch = input[i];
    if (ch === ' ') { parts.push('  '); continue; }
    var code = ch.charCodeAt(0);
    if (code < 32 || code > 127) continue;
    if (mode === 'dec') parts.push(String(code));
    else if (mode === 'hex') parts.push(code.toString(16).toUpperCase());
    else parts.push(code.toString(2).padStart(7, '0'));
  }
  out.textContent = parts.join(' ');
}

// Build table
var table = document.getElementById('asciiTable');
var chars = [];
for (var i = 65; i <= 90; i++) chars.push(i);
for (var i = 48; i <= 57; i++) chars.push(i);
chars.forEach(function(code) {
  var ch = String.fromCharCode(code);
  var r = document.createElement('div');
  r.className = 'ascii-row';
  r.innerHTML = '<span class="ch">' + ch + '</span><span class="dec">' + code + '</span><span class="hex">' + code.toString(16).toUpperCase() + '</span><span class="bin">' + code.toString(2).padStart(7, '0') + '</span>';
  r.onclick = function() { document.getElementById('inp').value += ch; encode(); };
  table.appendChild(r);
});

function copyOut() {
  navigator.clipboard.writeText(document.getElementById('out').textContent).then(function() {
    var btn = document.getElementById('copyBtn');
    btn.textContent = '✅ ' + scL10n.copie;
    setTimeout(function() { btn.textContent = '📋 ' + scL10n.copier; }, 1500);
  });
}

function exportTxt() {
  var input = document.getElementById('inp').value;
  var output = document.getElementById('out').textContent;
  var content = 'CODE ASCII\nMode: ' + mode + '\n\n' + scL10n.original + ' ' + input + '\n' + scL10n.encode + ' ' + output + '\n';
  var a = document.createElement('a');
  a.href = URL.createObjectURL(new Blob([content], {type: 'text/plain'}));
  a.download = 'message-ascii.txt';
  a.click();
}
</script>