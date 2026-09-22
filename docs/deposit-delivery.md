# Deposit Delivery

Blockchain activity can be discovered through webhook, polling, or controlled backfill. These paths converge on normalized durable state rather than independently applying financial effects.

## Outbox

A confirmed deposit creates or resolves a unique outbox record.

```text
blockchain event
      |
      v
normalize identity
      |
      v
persist confirmed deposit
      |
      v
create/resolve outbox
      |
      v
signed delivery
      |
      +---- failure ---> retry / manual review
      |
      v
mark delivered
```

The external event identity is stable. Reprocessing the same event must not create a second delivery identity.

A durable outbox prevents a remote HTTP failure from erasing the fact that the blockchain event was already confirmed locally.
