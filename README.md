[Lire en francais](README.fr.md)

# Scout Codes & Signs

A WordPress plugin for teaching scout cipher codes to youth. Features a daily code challenge, an interactive message encoder, and reference tables for 14 different codes.

## Features

- **Code of the Day** — Automatically displays a new cipher each day with an encoded scout motto
- **Message Encoder** — Interactive tool to encode messages using any of the 14 supported codes
- **Reference Tables** — Visual reference cards for all code alphabets
- **14 Code Pages** — Dedicated pages with history, fun facts, and interactive tools for each code
- **Admin Panel** — Configure daily messages, force a specific code, manage inventor portraits

### Supported Codes

Morse, Caesar cipher, Atbash, Binary (ASCII), Pigpen (Freemason), Semaphore (flags), Braille, Navajo, Telephone, Samurai, Chinese, Musical, Key cipher, Inverted & Lawyer, Two grids, Solar

## Installation

1. Compress the `scout-codes` folder as a `.zip`
2. WordPress: Plugins > Add New > Upload Plugin
3. Activate the plugin

## Shortcodes

| Shortcode | Description |
|-----------|-------------|
| `[scout_code_du_jour]` | Displays the code of the day with an encoded message |
| `[scout_encodeur]` | Interactive encoder for all scout codes |
| `[scout_codes_reference]` | Reference table for all codes |
| `[scout_code_du_jour code="morse"]` | Force a specific code |
| `[scout_codes_reference code="morse"]` | Show a single code's reference |

## Internationalization

The plugin supports French (default) and English. To switch language, set your WordPress locale via Settings > General > Site Language.

## License

[MIT](LICENSE)
