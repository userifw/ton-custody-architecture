# Reconciliation

Reconciliation is a separate recovery and audit capability rather than a hidden side effect of normal reads.

Recovery tooling can:

- reconcile observed blockchain operations into durable treasury history
- detect missing deposit delivery/outbox state
- reconstruct missing workflow records idempotently
- synchronize TON and Jetton read models
- re-check submitted or uncertain DEX swaps without creating another trade
- synchronize NFT Collection and Item state from on-chain evidence
- repair local state after an on-chain mutation succeeded but local persistence/synchronization failed
- perform controlled historical backfill when an ingestion path was unavailable

## Reconciliation questions

A production system should be able to answer:

1. What durable operation are we reconciling?
2. What external evidence exists?
3. What has already been applied internally?
4. Is the observed state final enough to act on?
5. Is the repair safe to repeat?
6. What changed as a result of the repair?

Reconciliation must not silently convert uncertainty into success. When evidence is insufficient, the operation remains pending or enters explicit review.
