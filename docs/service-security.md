# Service API Security

The custody API is a service boundary, not a public wallet API.

Production controls include:

- HMAC-SHA256 request authentication
- client identity
- bounded timestamp validity
- nonce replay protection
- idempotency keys on mutations
- HTTPS enforcement
- source-network restrictions
- rate limiting
- bounded request bodies
- audit metadata without secrets

The exact production canonical signing format is deliberately not reproduced here.

Replay protection and idempotency solve different problems: a nonce prevents reuse of a captured authenticated request, while an idempotency key makes a legitimate retry resolve to the same financial operation.

Secrets, signatures, wallet mnemonics, private keys, and complete sensitive payloads are excluded from operational logs.
