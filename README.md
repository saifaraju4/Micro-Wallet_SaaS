# Micro‑Wallet SaaS (PHP)

## Overview

Micro‑Wallet SaaS is a lightweight, open‑source PHP backend service designed to simulate a **credit‑based billing and wallet system** commonly found in SaaS platforms, APIs, and subscription services.

The project intentionally focuses on **core business logic** rather than UI complexity, making it suitable for:

* SaaS billing experiments
* Wallet / credit accounting prototypes
* Security research and auditing practice
* Backend architecture demonstrations

It reflects **real‑world design patterns** used in production systems such as API credit wallets, prepaid balances, and internal billing engines.

---

## Key Features

* User wallet with credit balance
* Purchase endpoint for consuming credits
* Simple authentication mechanism
* Persistent storage via MySQL
* Transaction logging
* Dockerized local environment

---

## Architecture

```text
micro-wallet-saas/
├── public/
│   └── purchase.php        # Public purchase endpoint
├── src/
│   ├── Auth.php            # Authentication logic
│   ├── Wallet.php          # Wallet & credit operations
│   ├── Database.php        # PDO database wrapper
│   └── Transaction.php    # Transaction persistence
├── config/
│   └── config.php          # Application configuration
├── database/
│   └── schema.sql          # Database schema
├── docker-compose.yml      # Local development stack
└── README.md
```

---

## Technology Stack

* **Language**: PHP 8.x
* **Database**: MySQL 8
* **Containerization**: Docker & Docker Compose
* **Paradigm**: Procedural endpoint + service classes

---

## Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/<owner>/micro-wallet-saas.git
cd micro-wallet-saas
```

### 2. Start the environment

```bash
docker-compose up -d
```

### 3. Initialize the database

```bash
docker exec -i wallet-db mysql -uroot -proot wallet < database/schema.sql
```

---

## API Usage

### Purchase credits

**Endpoint**

```
POST /purchase.php
```

**Parameters**

| Field   | Type | Description           |
| ------- | ---- | --------------------- |
| user_id | int  | Authenticated user ID |
| amount  | int  | Credits to deduct     |

**Example request**

```bash
curl -X POST http://localhost/purchase.php \
  -d "user_id=1&amount=50"
```

---

## Security Considerations

This project is provided **as‑is** for educational and demonstration purposes.

While it implements basic validation and persistence logic, it intentionally mirrors patterns often seen in early‑stage or internal SaaS services, where **business logic flaws can have serious financial impact**.

Maintainers and users are encouraged to perform security reviews before using similar logic in production environments.

---

## License

MIT License

---

## Disclaimer

This repository is intended for **learning, experimentation, and internal tooling**. It should not be deployed to production without a full security audit and proper hardening.
