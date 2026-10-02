# Failure Recovery

The service is designed around partial failure.

Examples include provider timeout after submission, duplicate or delayed webhooks, queue worker restarts, failed outbox delivery, receiving-service downtime, stale read models, custody mismatch, repeated withdrawal requests, expired DEX quotes, uncertain swap confirmation, and successful NFT mutations followed by failed local synchronization.

Recovery rules:

1. Financial and blockchain mutations have durable identities.
2. Mutation retries are idempotent.
3. External identities are persisted when known.
4. Duplicate external events converge on existing records.
5. Delivery state is durable.
6. Submission and confirmation are distinct concerns.
7. Failures and uncertainty remain observable.
8. Reconciliation is independently executable.
9. On-chain success is not repeated merely because a local post-processing step failed.
10. Manual review is preferable to guessing when automation cannot prove a safe transition.

## Examples

### Provider timeout after broadcast

Do not immediately resubmit. Preserve the operation identity and inspect external evidence before deciding whether another submission is safe.

### DEX confirmation is ambiguous

Keep the durable swap request and re-check it. Do not create a replacement trade simply because confirmation was delayed.

### NFT mint succeeds but synchronization fails

Treat the chain as evidence of the completed mutation and repair the local read model. Re-running the mint would risk creating another asset.

### Duplicate deposit event

Normalize the external identity and converge on the existing deposit/outbox state.

The goal is not to prevent every infrastructure failure. It is to prevent an infrastructure failure from becoming an untraceable or duplicated financial mutation.
