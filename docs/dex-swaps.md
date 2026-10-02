# DEX Swap Workflow

DEX execution is modeled as a durable workflow rather than a synchronous provider call.

## Quote boundary

A normalized quote can retain:

- network
- input and output asset identities
- atomic input amount
- expected output amount
- minimum acceptable output
- slippage bound
- gas budget
- provider and quote identity
- resolver/routing metadata
- expiration time

Provider output is validated before it becomes an executable local record. Unsafe gas budgets, unsupported assets, malformed atomic values, and expired quotes are rejected at the boundary.

## Durable execution

Creating a swap uses a separate idempotency identity. Repeating the same request resolves to the existing swap operation rather than producing another trade.

Submission runs asynchronously. The interactive request does not need to remain alive while the blockchain operation is processed.

## Confirmation and uncertainty

Submission and confirmation are separate states. A successful HTTP response is not treated as sufficient proof of final execution.

If confirmation cannot establish a safe outcome, the operation can remain pending or move to explicit manual review. A later reconciliation pass can re-check chain/provider evidence without creating another swap.

## Financial invariants

- amounts use integer atomic units
- minimum output is fixed by the accepted quote
- slippage is bounded
- gas budget is bounded
- quote expiration is enforced
- one idempotency identity maps to one mutation payload
- retries do not imply another trade
