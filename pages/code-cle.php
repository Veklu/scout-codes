<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#002a1a,#005a36,#007748);padding:48px 24px;text-align:center}
.hero h1{font-family:'Bitter',serif;font-size:2.8rem;color:#fff}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px}
.container{max-width:900px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--g);font-size:1.4rem;margin-bottom:8px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}
textarea.enc{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;margin-bottom:12px}
textarea.enc:focus{outline:none;border-color:var(--g);box-shadow:0 0 0 3px rgba(0,119,72,0.12)}
input.key-input{padding:12px;border:2px solid var(--gold);border-radius:10px;font-family:'JetBrains Mono';font-size:24px;text-align:center;letter-spacing:8px;width:220px;margin-bottom:12px}
input.key-input:focus{outline:none;border-color:var(--g);box-shadow:0 0 0 3px rgba(0,119,72,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-g{background:var(--g);color:#fff}
.btn-g:hover{background:var(--gd)}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}
.btn-o:hover{border-color:var(--g);color:var(--g)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}
.output-box{background:#002a1a;border-radius:12px;padding:20px 24px;min-height:60px;font-family:'JetBrains Mono';font-size:22px;letter-spacing:4px;line-height:2;word-break:break-all;color:#00e676}
.dir-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:12px;border:1px solid var(--bdr);max-width:350px}
.dir-toggle button{flex:1;padding:10px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:13px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.dir-toggle button.active{background:var(--g);color:#fff}
.breakdown{background:var(--cream);border:1px solid var(--bdr);border-radius:10px;padding:16px;margin-top:16px;font-family:'JetBrains Mono';font-size:13px;color:var(--soft);line-height:2.2;max-height:300px;overflow-y:auto}
.step{display:inline-flex;gap:4px;align-items:center;margin-right:14px}
.step .orig{color:var(--g);font-weight:700}
.step .shift{color:var(--gold);font-size:11px}
.step .result{color:#c0392b;font-weight:700}
.legend{background:var(--cream);border:1px solid var(--bdr);border-radius:10px;padding:16px;margin:16px 0;font-size:0.9rem;color:var(--soft);line-height:1.8}
.legend strong{color:var(--g)}
</style>
</div>
<div class="container">
  <div class="card">
    <h2><?php esc_html_e('Comment ça marche?', 'scout-codes'); ?></h2>
    <p class="desc"><?php echo wp_kses(__('On utilise une <strong>clé numérique</strong> (ex: 321) qui décale chaque lettre d\'un montant différent en cycle. La 1re lettre est décalée de +3, la 2e de +2, la 3e de +1, puis on recommence : la 4e de +3, etc. Sans la clé, le message est indéchiffrable!', 'scout-codes'), ['strong' => []]); ?></p>
    <div class="legend">
      <strong><?php esc_html_e('Exemple :', 'scout-codes'); ?></strong> <?php echo wp_kses(__('Message « AKELA VA » avec clé <strong>321</strong>', 'scout-codes'), ['strong' => []]); ?><br>
      A(+3)=D · K(+2)=M · E(+1)=F · L(+3)=O · A(+2)=C · V(+1)=W · A(+3)=D<br>
      → <?php echo wp_kses(__('Message transmis : <strong>DMFOC WD</strong>', 'scout-codes'), ['strong' => []]); ?><br><br>
      ⚠️ <?php esc_html_e('Pour décoder, il faut faire −3, −2, −1 (l\'inverse).', 'scout-codes'); ?>
    </div>
  </div>
  <div class="card">
    <h2>⚡ <?php esc_html_e('Encodeur / Décodeur', 'scout-codes'); ?></h2>
    <div style="margin-bottom:12px">
      <div class="output-label"><?php esc_html_e('CLÉ NUMÉRIQUE', 'scout-codes'); ?></div>
      <input type="text" class="key-input" id="keyInput" placeholder="321" value="321" oninput="go()">
    </div>
    <div class="dir-toggle" id="dirToggle">
      <button class="active" data-dir="encode"><?php esc_html_e('Encoder (+)', 'scout-codes'); ?></button>
      <button data-dir="decode"><?php esc_html_e('Décoder (−)', 'scout-codes'); ?></button>
    </div>
    <textarea class="enc" id="inp" placeholder="AKELA VA" oninput="go()"></textarea>
    <div class="btn-row">
      <button class="btn btn-g" onclick="go()"><?php esc_html_e('Convertir', 'scout-codes'); ?></button>
      <button class="btn btn-o" onclick="clearAll()"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
      <button class="btn btn-o" id="copyBtn" onclick="copyOut()">📋 <?php esc_html_e('Copier', 'scout-codes'); ?></button>
      <button class="btn btn-o" onclick="exportTxt()">💾 <?php esc_html_e('Exporter .txt', 'scout-codes'); ?></button>
    </div>
    <div class="output-label"><?php esc_html_e('RÉSULTAT', 'scout-codes'); ?></div>
    <div class="output-box" id="out"></div>
    <div class="breakdown" id="brk"></div>
  </div>
</div>

<script>var scL10n = <?php echo wp_json_encode([
  'copie' => __('Copié!', 'scout-codes'),
  'copier' => __('Copier', 'scout-codes'),
  'cleDeCode' => __('CLÉ DE CODE', 'scout-codes'),
  'cle' => __('Clé:', 'scout-codes'),
  'original' => __('Original:', 'scout-codes'),
  'resultat' => __('Résultat:', 'scout-codes'),
]); ?>;</script>
<script>
var cleDir = 'encode';

document.getElementById('dirToggle').addEventListener('click', function(e) {
  var btn = e.target.closest('button');
  if (!btn) return;
  cleDir = btn.dataset.dir;
  this.querySelectorAll('button').forEach(function(b) { b.classList.remove('active'); });
  btn.classList.add('active');
  go();
});

function go() {
  var input = document.getElementById('inp').value.toUpperCase();
  var keyStr = document.getElementById('keyInput').value.replace(/[^0-9]/g, '');
  var out = document.getElementById('out');
  var brk = document.getElementById('brk');
  if (!input.trim() || !keyStr) { out.textContent = ''; brk.innerHTML = ''; return; }
  var key = keyStr.split('').map(Number);
  var result = '';
  var bhtml = '';
  var ki = 0;
  for (var i = 0; i < input.length; i++) {
    var ch = input[i];
    if (ch === ' ') { result += ' '; continue; }
    var code = ch.charCodeAt(0);
    if (code < 65 || code > 90) { result += ch; continue; }
    var shift = key[ki % key.length];
    var dir = cleDir === 'encode' ? 1 : -1;
    var newCode = ((code - 65 + dir * shift + 26) % 26) + 65;
    var newCh = String.fromCharCode(newCode);
    result += newCh;
    bhtml += '<span class="step"><span class="orig">' + ch + '</span><span class="shift">' + (cleDir === 'encode' ? '+' : '\u2212') + shift + '</span>\u2192<span class="result">' + newCh + '</span></span>';
    ki++;
  }
  out.textContent = result;
  brk.innerHTML = bhtml;
}

function clearAll() {
  document.getElementById('inp').value = '';
  document.getElementById('out').textContent = '';
  document.getElementById('brk').innerHTML = '';
}

function copyOut() {
  var text = document.getElementById('out').textContent;
  navigator.clipboard.writeText(text).then(function() {
    var btn = document.getElementById('copyBtn');
    btn.textContent = '✅ ' + scL10n.copie;
    setTimeout(function() { btn.textContent = '📋 ' + scL10n.copier; }, 1500);
  });
}

function exportTxt() {
  var input = document.getElementById('inp').value;
  var output = document.getElementById('out').textContent;
  var keyVal = document.getElementById('keyInput').value;
  var content = scL10n.cleDeCode + '\n' + scL10n.cle + ' ' + keyVal + '\nMode: ' + cleDir + '\n\n' + scL10n.original + ' ' + input + '\n' + scL10n.resultat + ' ' + output + '\n';
  var blob = new Blob([content], {type: 'text/plain'});
  var a = document.createElement('a');
  a.href = URL.createObjectURL(blob);
  a.download = 'cle-de-code.txt';
  a.click();
}
</script>