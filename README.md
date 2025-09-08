# 🚦 Routelogger for Laravel

[![Packagist](https://img.shields.io/packagist/v/routelogger/routelogger.svg)](https://packagist.org/packages/routelogger/routelogger)
[![Downloads](https://img.shields.io/packagist/dt/routelogger/routelogger.svg)](https://packagist.org/packages/routelogger/routelogger)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

A lightweight Laravel package to **log route names, methods, and status codes automatically**.  
No manual middleware binding — just install and start logging 📜.

---

## 🚀 Installation

```bash
composer require routelogger/routelogger


---

## ⚙️ Configuration (Optional)

By default, Routelogger works **out-of-the-box** — it will log all routes in the `api` middleware group with route name (or URI), HTTP method, and status code.

If you’re happy with the defaults, **no changes are required** ✅.

But if you want to **customize behavior** (e.g., log web routes too, change emoji, or disable logging), you can publish the config file:

```bash
php artisan vendor:publish --tag=config
