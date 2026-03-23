[Read in English](README.md)

# Scout Codes & Signes

Un plugin WordPress pour enseigner les codes secrets scouts aux jeunes. Comprend un code du jour, un encodeur de messages interactif et des tableaux de reference pour 14 codes differents.

## Fonctionnalites

- **Code du jour** — Affiche automatiquement un nouveau code chaque jour avec une devise scoute encodee
- **Encodeur de messages** — Outil interactif pour encoder des messages dans n'importe quel code
- **Tableaux de reference** — Cartes visuelles pour tous les alphabets de codes
- **14 pages de codes** — Pages dediees avec historique, faits amusants et outils interactifs
- **Panneau d'administration** — Configurer les messages, forcer un code, gerer les portraits des inventeurs

### Codes supportes

Morse, Chiffre de Cesar, Atbash, Binaire (ASCII), Pigpen (Franc-macon), Semaphore (drapeaux), Braille, Navajo, Telephone, Samourais, Chinois, Musical, Code a cle, Inverse & avocat, Deux grilles, Solaire

## Installation

1. Compresser le dossier `scout-codes` en `.zip`
2. WordPress : Extensions > Ajouter > Televerser
3. Activer l'extension

## Shortcodes

| Shortcode | Description |
|-----------|-------------|
| `[scout_code_du_jour]` | Affiche le code du jour avec un message encode |
| `[scout_encodeur]` | Encodeur interactif pour tous les codes scouts |
| `[scout_codes_reference]` | Tableau de reference de tous les codes |
| `[scout_code_du_jour code="morse"]` | Forcer un code specifique |
| `[scout_codes_reference code="morse"]` | Afficher la reference d'un seul code |

## Internationalisation

Le plugin supporte le francais (par defaut) et l'anglais. Pour changer de langue, modifier la locale WordPress via Reglages > General > Langue du site.

## Licence

[MIT](LICENSE)
