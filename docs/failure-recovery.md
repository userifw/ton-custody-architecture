# Failure Recovery

The service is designed around partial failure.

Examples include provider timeout after submission, duplicate or delayed webhooks, queue worker restarts, failed outbox delivery, receiving-service downtime, stale read models, custody mismatch, and repeated withdrawal requests.

Recovery rules:

1. Financial operations have durable identities.
2. Mutation retries are idempotent.
3. External identities are persisted when known.
4. Duplicate external events converge on existing records.
5. Delivery state is durable.
6. Failures remain observable.
7. Reconciliation is independently executable.
8. Manual review is preferable to guessing when automation cannot prove a safe transition.

The goal is not to prevent every infrastructure failure. It is to prevent an infrastructure failure from becoming an untraceable financial mutation.
