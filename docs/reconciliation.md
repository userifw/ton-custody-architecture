# Reconciliation

Reconciliation is a separate recovery and audit capability rather than a hidden side effect of normal reads.

Recovery tooling can:

- reconcile observed blockchain operations into durable treasury history
- detect missing deposit delivery/outbox state
- reconstruct missing workflow records idempotently
- synchronize blockchain read models
- perform controlled backfill when an ingestion path was unavailable

A production system should be able to answer what operation is missing, what external evidence exists, what has already been applied internally, whether a repair is safe to repeat, and what changed after repair.
