<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc;--orange:#e67e22}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#1a1a2e,#16213e,#0f3460);padding:48px 24px;text-align:center}
.hero h1{font-family:'Bitter',serif;font-size:2.8rem;color:#fff}.hero h1 span{color:var(--orange)}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--orange);margin-top:12px}
.container{max-width:920px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--orange);font-size:1.4rem;margin-bottom:6px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}
.solair-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:12px;margin:20px 0}
.solair-card{background:var(--cream);border:2px solid var(--bdr);border-radius:14px;padding:20px 16px;text-align:center;transition:0.15s}
.solair-card:hover{border-color:var(--orange);transform:translateY(-2px)}
.solair-card .sym{font-size:42px;font-weight:900;color:var(--txt);margin-bottom:8px;font-family:'Bitter';line-height:1}
.solair-card .sym-name{font-family:'Bitter';font-size:13px;font-weight:700;color:var(--orange)}
.solair-card .sym-desc{font-size:11px;color:var(--muted);margin-top:4px}
.warning{background:linear-gradient(135deg,#fff3e0,#ffe8cc);border:2px solid #f0c080;border-radius:12px;padding:20px;margin:20px 0;font-size:0.9rem;color:#5a3000}
.warning strong{color:var(--orange)}
</style>
</div>
<div class="container">
<div class="card">
  <h2><?php esc_html_e('Symboles d\'urgence', 'scout-codes'); ?></h2>
  <p class="desc"><?php echo wp_kses(__('Ces symboles servent à communiquer avec un avion de secours depuis le sol. Ils doivent être tracés au sol avec des matériaux visibles (branches, pierres, tissu, neige) et mesurer au minimum <strong>2.5 mètres (8 pieds)</strong> de longueur.', 'scout-codes'), ['strong' => []]); ?></p>

  <div class="solair-grid">
    <div class="solair-card"><div class="sym">I</div><div class="sym-name"><?php esc_html_e('Besoin de médicaments', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('1 trait vertical', 'scout-codes'); ?></div></div>
    <div class="solair-card"><div class="sym">I I</div><div class="sym-name"><?php esc_html_e('Incapable de poursuivre', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('2 traits verticaux', 'scout-codes'); ?></div></div>
    <div class="solair-card"><div class="sym">X</div><div class="sym-name"><?php esc_html_e('Besoin de carte et boussole', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('Croix en X', 'scout-codes'); ?></div></div>
    <div class="solair-card"><div class="sym">F</div><div class="sym-name"><?php esc_html_e('Besoin d\'eau et nourriture', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('Lettre F', 'scout-codes'); ?></div></div>
    <div class="solair-card"><div class="sym">□</div><div class="sym-name"><?php esc_html_e('Besoin de réparation', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('Carré / lettre W', 'scout-codes'); ?></div></div>
    <div class="solair-card"><div class="sym">L</div><div class="sym-name"><?php esc_html_e('Besoin de carburant et huile', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('Lettre L', 'scout-codes'); ?></div></div>
    <div class="solair-card"><div class="sym">→</div><div class="sym-name"><?php esc_html_e('Voyage dans cette direction', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('Flèche directionnelle', 'scout-codes'); ?></div></div>
    <div class="solair-card"><div class="sym">N</div><div class="sym-name"><?php esc_html_e('Non / négatif', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('Lettre N', 'scout-codes'); ?></div></div>
    <div class="solair-card"><div class="sym">Y</div><div class="sym-name"><?php esc_html_e('Oui / affirmatif', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('Lettre Y', 'scout-codes'); ?></div></div>
    <div class="solair-card"><div class="sym">LL</div><div class="sym-name"><?php esc_html_e('Tout va bien', 'scout-codes'); ?></div><div class="sym-desc"><?php esc_html_e('Deux L', 'scout-codes'); ?></div></div>
  </div>

  <div class="warning">
    <strong>⚠️ <?php esc_html_e('Important :', 'scout-codes'); ?></strong> <?php echo wp_kses(__('Ces symboles doivent être <strong>très grands</strong> (minimum 2.5m) pour être vus du ciel. Utilisez un contraste fort avec le terrain environnant. Des branches sombres sur neige blanche, ou des pierres claires sur terre foncée, fonctionnent le mieux.', 'scout-codes'), ['strong' => []]); ?>
  </div>
</div>
</div>