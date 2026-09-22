# Withdrawal Lifecycle

Withdrawals are modeled as durable operations rather than one-shot RPC calls.

Principles:

- assign a durable local identity
- validate and reserve the required amount
- bind retries to an idempotency key
- submit the external operation through a controlled worker
- persist the resulting external identity when known
- retain explicit failure state
- finalize or release reserved state according to the confirmed outcome

A retry using the same idempotency identity resolves to the original withdrawal. Reusing that identity for a different payload is rejected.

Long-running blockchain operations execute outside the interactive web request so a queue restart does not erase the durable operation state.
