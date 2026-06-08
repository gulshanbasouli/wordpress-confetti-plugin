# 🎉 Minigiv Confetti

A lightweight WordPress plugin that allows administrators to configure confetti settings and manage promotional confetti campaigns through the WordPress dashboard.

## Features

* Easy-to-use admin settings page
* Configure confetti trigger price
* Set discount coupon information
* Enable or disable confetti functionality
* Shortcode support
* Lightweight and beginner-friendly
* WordPress standards compliant

## Installation

1. Download the plugin ZIP file.

2. Upload the plugin to:

   ```
   /wp-content/plugins/
   ```

3. Activate the plugin through the **Plugins** menu in WordPress.

4. Navigate to:

   ```
   Settings → Minigiv Confetti
   ```

5. Configure your desired settings.

---

## Configuration

### Confetti Price

Set the minimum price required to trigger confetti functionality.

### Discount Coupon

Configure the discount coupon associated with the confetti campaign.

### Confetti Status

* Active
* Inactive

---

## Shortcodes

Display saved confetti settings:

```text
[confetti-data]
```

Using inside PHP templates:

```php
<?php echo do_shortcode('[confetti-data]'); ?>
```

---

## Requirements

* WordPress 5.0+
* PHP 7.4+

---

## Changelog

### Version 1.0.0

* Initial public release
* Admin settings page
* Option management
* Shortcode support
* Secure form processing
* Nonce verification
* User capability checks

---

## Security

The plugin follows WordPress security best practices:

* Capability checks
* Nonce verification
* Input sanitization
* Safe redirects
* Direct access protection

---

## Author

**Gulshan Chauhan**

Website:
https://loeion.com

GitHub:
https://github.com/gulshanbasouli

Plugin Repository:
https://github.com/gulshanbasouli/minigiv-confetti

---

## License

GPL v2 or later

This plugin is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License.
