<?php
/**
 * Fun facts generator for code pages.
 * Included at the bottom of each code page by the shortcode.
 * Expects $code_slug to be set.
 */
defined('ABSPATH') || exit;

$fun_facts = [

'morse' => [
    'inventor_emoji' => '📡',
    'inventor' => 'Samuel Morse',
    'years' => '1791 – 1872',
    'origin' => 'États-Unis 🇺🇸',
    'portrait' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Samuel_Finley_Breese_Morse_-_Samuel_F._B._Morse_Self-Portrait_-_Google_Art_Project.jpg/220px-Samuel_Finley_Breese_Morse_-_Samuel_F._B._Morse_Self-Portrait_-_Google_Art_Project.jpg',
    'portrait_credit' => 'Autoportrait par Samuel Morse, vers 1812. National Portrait Gallery, Smithsonian. Domaine public.',
    'portrait_source' => 'https://commons.wikimedia.org/wiki/File:Samuel_Finley_Breese_Morse_-_Samuel_F._B._Morse_Self-Portrait_-_Google_Art_Project.jpg',
    'kid_intro' => 'Imagine que tu veux envoyer un message à ton ami, mais tu ne peux utiliser qu\'un seul bouton — appuyer court ou appuyer long. C\'est exactement comme ça que fonctionne le code Morse! Chaque lettre est un mélange de « bips » courts (les points) et de « biiips » longs (les traits).',
    'facts' => [
        '📡 Le premier message en code Morse a été envoyé le 24 mai 1844 entre Washington et Baltimore — 60 km! Le message disait « What hath God wrought! » (Qu\'est-ce que Dieu a fait!).',
        '🎨 Avant d\'inventer le télégraphe, Samuel Morse était peintre! Il a peint des tableaux pour des présidents américains.',
        '🚢 Le SOS (··· ——— ···) est devenu le signal de détresse international en 1906. Le Titanic l\'a utilisé en 1912.',
        '⚡ Le code Morse est encore utilisé aujourd\'hui! Les radioamateurs et certains pilotes l\'utilisent pour communiquer.',
        '🏕️ Les scouts apprennent le Morse pour communiquer à distance avec des lampes de poche, des sifflets ou en frappant sur des objets.',
    ],
    'links' => [
        ['Code Morse — Wikipédia', 'https://fr.wikipedia.org/wiki/Code_Morse_international'],
        ['Samuel Morse — Wikipédia', 'https://fr.wikipedia.org/wiki/Samuel_Morse'],
        ['Apprendre le Morse (jeu)', 'https://morse.withgoogle.com/learn/'],
    ],
],

'braille' => [
    'inventor_emoji' => '⠿',
    'inventor' => 'Louis Braille',
    'years' => '1809 – 1852',
    'origin' => 'France 🇫🇷',
    'portrait' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Portrait_of_Louis_Braille.jpg/220px-Portrait_of_Louis_Braille.jpg',
    'portrait_credit' => 'Portrait de Louis Braille, basé sur un daguerréotype posthume. Domaine public.',
    'portrait_source' => 'https://commons.wikimedia.org/wiki/Louis_Braille',
    'kid_intro' => 'Louis Braille est devenu aveugle à 3 ans après un accident dans l\'atelier de son papa (qui fabriquait des selles pour chevaux). Mais ça ne l\'a pas arrêté! À seulement 15 ans, il a inventé un système génial : 6 petits points en relief que tu peux toucher avec tes doigts pour lire sans les yeux.',
    'facts' => [
        '👦 Louis avait seulement 15 ans quand il a inventé son système! C\'est comme si un élève de secondaire 3 changeait le monde.',
        '🎵 Le braille ne sert pas qu\'à lire — il existe aussi un braille musical pour les musiciens aveugles!',
        '🏛️ Louis Braille est enterré au Panthéon à Paris, avec les plus grands héros de la France.',
        '🌍 Le braille est utilisé dans presque toutes les langues du monde, même le chinois et l\'arabe!',
        '📱 Aujourd\'hui, les téléphones et ordinateurs peuvent convertir du texte en braille grâce à des « plages braille » — des appareils avec des picots qui montent et descendent.',
    ],
    'links' => [
        ['Louis Braille — Wikipédia', 'https://fr.wikipedia.org/wiki/Louis_Braille'],
        ['Braille — Wikipédia', 'https://fr.wikipedia.org/wiki/Braille'],
        ['Maison Louis Braille (musée)', 'https://www.maisonlouisbraille.org/'],
    ],
],

'tictactoc' => [
    'inventor_emoji' => '✏️',
    'inventor' => 'Les Francs-maçons',
    'years' => 'XVIIIe siècle',
    'origin' => 'Europe 🇪🇺',
    'portrait' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Pigpen_cipher_key.svg/220px-Pigpen_cipher_key.svg.png',
    'portrait_credit' => 'Grille du chiffre Pigpen. Wikimedia Commons, domaine public.',
    'portrait_source' => 'https://commons.wikimedia.org/wiki/File:Pigpen_cipher_key.svg',
    'kid_intro' => 'Tu connais le jeu de tic-tac-toe (morpion)? Et bien imagine que tu caches des lettres dans chaque case de la grille! C\'est exactement ce que faisaient les Francs-maçons (une société secrète) il y a 300 ans pour écrire des messages que personne d\'autre ne pouvait lire.',
    'facts' => [
        '🏰 On a retrouvé ce code gravé sur des pierres tombales de Francs-maçons dans des cimetières!',
        '🐷 En anglais, ce code s\'appelle « Pigpen cipher » (le code du poulailler) parce que les formes ressemblent à des enclos pour cochons.',
        '🔍 C\'est un des codes les plus faciles à apprendre — en 5 minutes tu peux écrire des messages secrets!',
        '📜 Les espions et les pirates utilisaient des codes similaires pour cacher leurs trésors.',
    ],
    'links' => [
        ['Chiffre Pigpen — Wikipédia', 'https://fr.wikipedia.org/wiki/Chiffre_des_francs-maçons'],
        ['Franc-maçonnerie — Vikidia (pour les jeunes)', 'https://fr.vikidia.org/wiki/Franc-maçonnerie'],
    ],
],

'semaphore' => [
    'inventor_emoji' => '🚩',
    'inventor' => 'Claude Chappe',
    'years' => '1763 – 1805',
    'origin' => 'France 🇫🇷',
    'portrait' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Claude_Chappe.png/220px-Claude_Chappe.png',
    'portrait_credit' => 'Portrait de Claude Chappe, inventeur du télégraphe optique. Domaine public.',
    'portrait_source' => 'https://commons.wikimedia.org/wiki/File:Claude_Chappe.png',
    'kid_intro' => 'Avant les téléphones et Internet, comment envoyer un message très loin et très vite? Avec des drapeaux! En bougeant tes deux bras dans différentes positions, tu peux « dire » chaque lettre de l\'alphabet. Les marins sur les bateaux utilisent encore ce système aujourd\'hui!',
    'facts' => [
        '🚢 La marine britannique utilisait le sémaphore pour communiquer entre bateaux — jusqu\'à 7 km de distance avec des jumelles!',
        '⚡ Le système de Claude Chappe pouvait envoyer un message de Paris à Lyon (450 km) en seulement 2 minutes!',
        '🏋️ Un bon signaleur peut transmettre 8 mots par minute — c\'est comme texter avec les bras!',
        '🏕️ Les scouts pratiquent le sémaphore pour communiquer entre deux collines ou deux rives d\'un lac.',
    ],
    'links' => [
        ['Sémaphore — Wikipédia', 'https://fr.wikipedia.org/wiki/Alphabet_sémaphore'],
        ['Claude Chappe — Wikipédia', 'https://fr.wikipedia.org/wiki/Claude_Chappe'],
        ['Alphabet grec — Vikidia', 'https://fr.vikidia.org/wiki/Alphabet_grec'],
    ],
],

'substitution' => [
    'inventor_emoji' => '🏛️',
    'inventor' => 'Jules César',
    'years' => '100 av. J.-C. – 44 av. J.-C.',
    'origin' => 'Empire romain 🏛️',
    'portrait' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Caesar_pushkin.jpg/220px-Caesar_pushkin.jpg',
    'portrait_credit' => 'Buste de Jules César, musée Pouchkine. Domaine public.',
    'portrait_source' => 'https://commons.wikimedia.org/wiki/File:Caesar_pushkin.jpg',
    'kid_intro' => 'Jules César était un général romain super puissant. Pour envoyer des ordres secrets à ses soldats, il a eu une idée simple mais brillante : remplacer chaque lettre par celle qui est 3 places plus loin dans l\'alphabet! Donc A devient D, B devient E, et ainsi de suite. Simple, mais personne ne le savait à l\'époque!',
    'facts' => [
        '🏛️ Jules César utilisait toujours un décalage de 3, mais tu peux utiliser n\'importe quel nombre de 1 à 25!',
        '🧮 Il y a 2000 ans, ce code était presque impossible à casser. Aujourd\'hui, un ordinateur peut le casser en moins d\'une seconde!',
        '🕵️ Le code de César est la base de presque tous les codes secrets modernes — même ceux des banques et d\'Internet!',
        '👑 Auguste, le neveu de César, utilisait un décalage de 1 seulement (A→B). Pas très sécuritaire!',
    ],
    'links' => [
        ['Chiffre de César — Wikipédia', 'https://fr.wikipedia.org/wiki/Chiffrement_par_décalage'],
        ['Jules César — Vikidia', 'https://fr.vikidia.org/wiki/Jules_César'],
        ['Cryptographie — Vikidia', 'https://fr.vikidia.org/wiki/Cryptographie'],
    ],
],

'ascii' => [
    'inventor' => 'Bob Bemer (comité ASCII)',
    'years' => '1963',
    'origin' => 'États-Unis 🇺🇸',
    'kid_intro' => 'Les ordinateurs ne comprennent que deux choses : allumé (1) et éteint (0). C\'est comme un interrupteur! Alors comment leur faire comprendre des lettres? En les transformant en suites de 0 et de 1! Chaque lettre a son propre « numéro binaire ». Par exemple, A = 01000001.',
    'facts' => [
        '💡 Un bit c\'est un seul 0 ou 1. Il en faut 8 (un octet) pour faire une lettre — c\'est comme un mot de passe à 8 chiffres, mais avec seulement des 0 et des 1!',
        '🌍 Le mot « BONJOUR » en binaire prend 56 bits (7 lettres × 8 bits). Ton nom prend encore plus!',
        '🖥️ Chaque seconde, ton ordinateur traite des milliards de 0 et de 1. C\'est comme si tu lisais des millions de livres en un clin d\'oeil!',
        '📱 Les emojis aussi ont un code binaire! Le smiley 😀 c\'est 11110000 10011111 10011000 10000000.',
    ],
    'links' => [
        ['ASCII — Wikipédia', 'https://fr.wikipedia.org/wiki/American_Standard_Code_for_Information_Interchange'],
        ['Système binaire — Vikidia', 'https://fr.vikidia.org/wiki/Système_binaire'],
    ],
],

'telephone' => [
    'inventor_emoji' => '📱',
    'inventor' => 'Alexander Graham Bell',
    'years' => '1847 – 1922',
    'origin' => 'Écosse / Canada / É.-U. 🇬🇧🇨🇦🇺🇸',
    'portrait' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Alexander_Graham_Bell_and_telephone.jpg/220px-Alexander_Graham_Bell_and_telephone.jpg',
    'portrait_credit' => 'Alexander Graham Bell avec un téléphone, vers 1876. Domaine public, Library of Congress.',
    'portrait_source' => 'https://commons.wikimedia.org/wiki/File:Alexander_Graham_Bell_and_telephone.jpg',
    'kid_intro' => 'Regarde les touches de ton téléphone : sous chaque chiffre, il y a des lettres! Le 2 = ABC, le 3 = DEF, etc. Avant les écrans tactiles, on appuyait plusieurs fois sur une touche pour choisir la lettre. C\'est comme ça qu\'est né un code secret basé sur les numéros de téléphone!',
    'facts' => [
        '📱 Avant les smartphones, envoyer un texto prenait une éternité : pour écrire « SALUT », il fallait appuyer 13 fois sur les touches!',
        '🇨🇦 Alexander Graham Bell, l\'inventeur du téléphone, a vécu à Brantford en Ontario! Le Canada est le berceau du téléphone.',
        '☎️ Le premier appel téléphonique a été fait le 10 mars 1876. Bell a dit : « Mr. Watson, venez ici, je veux vous voir. »',
        '🔢 Le code téléphone est utilisé partout : les codes postaux, les mots de passe Wi-Fi (quand c\'est un numéro de téléphone!), et même les plaques d\'immatriculation.',
    ],
    'links' => [
        ['Clavier téléphonique — Wikipédia', 'https://fr.wikipedia.org/wiki/Clavier_téléphonique'],
        ['Alexander Graham Bell — Vikidia', 'https://fr.vikidia.org/wiki/Alexander_Graham_Bell'],
    ],
],

'samourais' => [
    'kid_intro' => 'Les samouraïs étaient des guerriers japonais super entraînés qui suivaient un code d\'honneur appelé « bushido ». Ils utilisaient des symboles secrets pour communiquer entre eux. Ce code scout s\'inspire de leurs techniques!',
    'facts' => [
        '⚔️ Les samouraïs s\'entraînaient dès l\'âge de 5 ans — comme l\'âge des Castors!',
        '🏯 Le Japon a eu des samouraïs pendant presque 700 ans (du XIIe au XIXe siècle).',
        '📝 Les samouraïs devaient aussi savoir lire, écrire et peindre — pas juste se battre!',
        '🎌 Le mot « samouraï » veut dire « celui qui sert » en japonais.',
    ],
    'links' => [
        ['Samouraï — Vikidia', 'https://fr.vikidia.org/wiki/Samouraï'],
        ['Bushido — Wikipédia', 'https://fr.wikipedia.org/wiki/Bushidō'],
    ],
],

'chinois' => [
    'kid_intro' => 'L\'écriture chinoise est une des plus vieilles du monde — plus de 3000 ans! Chaque « caractère » est comme un petit dessin. Ce code scout utilise le nombre de traits dans les caractères pour cacher des messages.',
    'facts' => [
        '📝 Il existe plus de 50 000 caractères chinois, mais un élève en apprend environ 3 000 à l\'école.',
        '🖌️ L\'écriture chinoise se fait traditionnellement avec un pinceau et de l\'encre — c\'est un art appelé calligraphie.',
        '📜 Les plus anciens caractères chinois ont été trouvés gravés sur des os d\'animaux et des carapaces de tortues!',
        '🌏 Plus d\'un milliard de personnes utilisent les caractères chinois (en Chine, au Japon, et en Corée).',
    ],
    'links' => [
        ['Écriture chinoise — Vikidia', 'https://fr.vikidia.org/wiki/Écriture_chinoise'],
        ['Calligraphie — Vikidia', 'https://fr.vikidia.org/wiki/Calligraphie'],
    ],
],

'musique' => [
    'kid_intro' => 'Tu sais que les notes de musique s\'appellent DO, RÉ, MI, FA, SOL, LA, SI? Et bien on peut cacher des lettres dans les notes! C\'est un code qui mélange deux choses géniales : la musique et les secrets.',
    'facts' => [
        '🎹 Le compositeur Bach cachait son nom dans ses compositions! B-A-C-H = Si bémol, La, Do, Si en notation allemande.',
        '🎵 Il y a seulement 7 notes mais des millions de chansons possibles — exactement comme avec 26 lettres on peut écrire des millions de mots!',
        '🧠 Apprendre la musique aide le cerveau à mieux décoder les langages secrets — les scouts musiciens ont un avantage!',
    ],
    'links' => [
        ['Solfège — Vikidia', 'https://fr.vikidia.org/wiki/Solfège'],
        ['Notes de musique — Vikidia', 'https://fr.vikidia.org/wiki/Note_de_musique'],
    ],
],

'cle' => [
    'kid_intro' => 'Imagine que toi et ton ami vous choisissez un mot secret (par exemple « SCOUT »). Ce mot devient votre « clé » pour encoder et décoder les messages. Sans la clé, personne ne peut lire le message. C\'est le même principe que les mots de passe sur Internet!',
    'facts' => [
        '🔑 Pendant la Seconde Guerre mondiale, les Alliés ont cassé le code allemand « Enigma » — ça a aidé à gagner la guerre!',
        '🏕️ Les scouts utilisent souvent un mot de passe de camp comme clé de chiffrement.',
        '💻 Quand tu te connectes à un site web sécurisé (https://), ton navigateur utilise des « clés » de millions de chiffres!',
    ],
    'links' => [
        ['Chiffre de Vigenère — Wikipédia', 'https://fr.wikipedia.org/wiki/Chiffre_de_Vigenère'],
        ['Cryptographie — Vikidia', 'https://fr.vikidia.org/wiki/Cryptographie'],
    ],
],

'inverse-avocat' => [
    'kid_intro' => 'Le code inversé, c\'est super simple : tu écris ton message à l\'envers! « BONJOUR » devient « RUOJNOB ». Le code avocat est encore plus rigolo : tu coupes chaque mot en deux et tu inverses les moitiés. Facile à apprendre, difficile à lire pour les non-initiés!',
    'facts' => [
        '🪞 Léonard de Vinci écrivait tous ses carnets à l\'envers — il fallait un miroir pour les lire!',
        '📖 Certaines langues, comme l\'arabe et l\'hébreu, s\'écrivent déjà de droite à gauche.',
        '🧩 L\'inversion est une des techniques les plus anciennes — même les enfants romains jouaient avec il y a 2000 ans.',
    ],
    'links' => [
        ['Léonard de Vinci — Vikidia', 'https://fr.vikidia.org/wiki/Léonard_de_Vinci'],
        ['Écriture spéculaire — Wikipédia', 'https://fr.wikipedia.org/wiki/Écriture_spéculaire'],
    ],
],

'deux-grilles' => [
    'kid_intro' => 'Imagine deux feuilles avec des grilles. Sur la première, tu écris ton message dans certaines cases. Ensuite, tu remplis les cases vides avec des lettres au hasard. Seul celui qui a la deuxième grille (le « masque ») peut retrouver les bonnes lettres! C\'est comme un filtre magique.',
    'facts' => [
        '🕵️ Ce type de code s\'appelle un « grille tournante » ou « cardan » — inventé au XVIe siècle par Jérôme Cardan.',
        '📮 Les espions de la Première Guerre mondiale utilisaient des grilles cachées dans des cartes postales!',
        '🎴 Tu peux fabriquer tes propres grilles avec du carton et des ciseaux — un super projet de bricolage scout!',
    ],
    'links' => [
        ['Grille de Cardan — Wikipédia', 'https://fr.wikipedia.org/wiki/Grille_de_Cardan'],
        ['Stéganographie — Vikidia', 'https://fr.vikidia.org/wiki/Stéganographie'],
    ],
],

'solaire' => [
    'kid_intro' => 'Le code solaire utilise la position du soleil et les cadrans solaires comme inspiration. Chaque lettre est représentée par un symbole qui ressemble à la position d\'une ombre sur un cadran. C\'est un code qui connecte la nature et les secrets!',
    'facts' => [
        '☀️ Les cadrans solaires sont parmi les plus anciennes « machines » inventées par l\'humain — plus de 3500 ans!',
        '🧭 Les scouts apprennent à lire l\'heure avec le soleil et une boussole — très utile en camping!',
        '🌎 Un cadran solaire fonctionne différemment selon l\'endroit où tu te trouves sur la Terre.',
    ],
    'links' => [
        ['Cadran solaire — Vikidia', 'https://fr.vikidia.org/wiki/Cadran_solaire'],
    ],
],

]; // end $fun_facts

if (!isset($fun_facts[$code_slug])) return;
$facts = $fun_facts[$code_slug];
?>

<div style="max-width:800px;margin:24px auto;padding:0 20px">

<!-- INVENTOR / HISTORY SECTION -->
<div style="background:#fff;border:1px solid #e0ddd4;border-radius:16px;overflow:hidden;box-shadow:0 2px 12px rgba(0,0,0,0.05);margin-bottom:20px">
    <div style="background:linear-gradient(135deg,#f0faf4,#e8f8f0);padding:24px;display:flex;gap:20px;flex-wrap:wrap;align-items:center">
        <?php
        // Check for locally uploaded portrait first (via WP Media Library)
        $local_portrait = get_option('scout_codes_portrait_' . $code_slug, '');
        $portrait_url = $local_portrait ?: ($facts['portrait'] ?? '');
        if ($portrait_url):
        ?>
        <div style="flex-shrink:0;text-align:center">
            <img src="<?php echo esc_url($portrait_url); ?>" alt="<?php echo esc_attr($facts['inventor'] ?? ''); ?>" style="width:140px;height:auto;border-radius:12px;border:3px solid #fff;box-shadow:0 4px 12px rgba(0,0,0,0.1)" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
            <div style="display:none;width:140px;height:160px;background:linear-gradient(135deg,#e8f8f0,#d4f0e0);border-radius:12px;border:3px solid #fff;box-shadow:0 4px 12px rgba(0,0,0,0.1);align-items:center;justify-content:center;font-size:3rem"><?php echo esc_html($facts['inventor_emoji'] ?? '👤'); ?></div>
            <?php if (!empty($facts['portrait_credit'])): ?>
            <div style="font-size:0.65rem;color:#6a6a62;margin-top:6px;max-width:140px;line-height:1.3">
                <a href="<?php echo esc_url($facts['portrait_source'] ?? '#'); ?>" target="_blank" rel="noopener" style="color:#6a6a62;text-decoration:underline"><?php echo esc_html($facts['portrait_credit']); ?></a>
            </div>
            <?php endif; ?>
        </div>
        <?php elseif (!empty($facts['inventor'])): ?>
        <div style="flex-shrink:0;width:140px;height:160px;background:linear-gradient(135deg,#e8f8f0,#d4f0e0);border-radius:12px;border:3px solid #fff;box-shadow:0 4px 12px rgba(0,0,0,0.1);display:flex;flex-direction:column;align-items:center;justify-content:center">
            <div style="font-size:3rem"><?php echo esc_html($facts['inventor_emoji'] ?? '👤'); ?></div>
            <div style="font-size:0.7rem;color:#007748;font-weight:600;margin-top:4px"><?php echo esc_html($facts['inventor']); ?></div>
        </div>
        <?php endif; ?>
        <div style="flex:1;min-width:200px">
            <?php if (!empty($facts['inventor'])): ?>
            <div style="font-size:0.75rem;color:#007748;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px">Inventeur</div>
            <h2 style="font-size:1.5rem;color:#003320;margin:0 0 4px;font-weight:700"><?php echo esc_html($facts['inventor']); ?></h2>
            <?php endif; ?>
            <?php if (!empty($facts['years'])): ?>
            <div style="font-size:0.85rem;color:#6a6a62;margin-bottom:2px">📅 <?php echo esc_html($facts['years']); ?></div>
            <?php endif; ?>
            <?php if (!empty($facts['origin'])): ?>
            <div style="font-size:0.85rem;color:#6a6a62">🌍 <?php echo esc_html($facts['origin']); ?></div>
            <?php endif; ?>
        </div>
    </div>
    <div style="padding:20px 24px;border-top:1px solid #e0ddd4">
        <div style="display:flex;gap:8px;align-items:flex-start">
            <span style="font-size:1.5rem;line-height:1">💬</span>
            <p style="font-size:0.92rem;color:#3a3a36;line-height:1.7;margin:0"><strong>Expliqué simplement :</strong> <?php echo esc_html($facts['kid_intro']); ?></p>
        </div>
    </div>
</div>

<!-- FUN FACTS -->
<div style="background:#fff;border:1px solid #e0ddd4;border-radius:16px;padding:24px;margin-bottom:20px;box-shadow:0 2px 12px rgba(0,0,0,0.05)">
    <h3 style="color:#007748;margin:0 0 16px;font-size:1.1rem">🎯 Le savais-tu?</h3>
    <div style="display:flex;flex-direction:column;gap:10px">
        <?php foreach ($facts['facts'] as $fact): ?>
        <div style="background:#f9f8f5;border-radius:10px;padding:12px 16px;font-size:0.88rem;color:#3a3a36;line-height:1.6;border-left:3px solid #007748">
            <?php echo esc_html($fact); ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- LEARN MORE LINKS -->
<?php if (!empty($facts['links'])): ?>
<div style="background:#fff;border:1px solid #e0ddd4;border-radius:16px;padding:24px;margin-bottom:20px;box-shadow:0 2px 12px rgba(0,0,0,0.05)">
    <h3 style="color:#007748;margin:0 0 12px;font-size:1.1rem">📚 Pour en savoir plus</h3>
    <div style="display:flex;flex-wrap:wrap;gap:8px">
        <?php foreach ($facts['links'] as $link): ?>
        <a href="<?php echo esc_url($link[1]); ?>" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:6px;padding:8px 14px;background:#f0faf4;border:1px solid #b8e6cc;border-radius:8px;text-decoration:none;color:#007748;font-size:0.82rem;font-weight:600;transition:all 0.15s">
            🔗 <?php echo esc_html($link[0]); ?>
        </a>
        <?php endforeach; ?>
    </div>
    <p style="font-size:0.7rem;color:#999;margin:10px 0 0;line-height:1.4">Les liens vers Vikidia sont adaptés aux jeunes lecteurs. Les liens Wikipédia sont plus détaillés pour les animateurs et parents.</p>
</div>
<?php endif; ?>

</div>
