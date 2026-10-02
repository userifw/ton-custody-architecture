# NFT Lifecycle

NFT operations are treated as durable blockchain mutations with independently verifiable on-chain state.

## Collection deployment

Collection deployment uses deterministic contract inputs and public metadata. Before broadcasting, metadata and required contract artifacts are validated. After submission, the resulting Collection state is read back from the network.

A deployment record can therefore distinguish a newly broadcast deployment from a Collection that was already deployed and verified.

## Mint

Minting binds together:

- Collection identity
- expected item index when required
- recipient
- public metadata
- attached TON budget
- resulting NFT address
- transaction evidence

The important boundary is on-chain truth: if the mint succeeds but local synchronization fails, the NFT is not minted again. The read model is repaired from chain state.

## Transfer

Transfers follow the same principle: submission and observed ownership are separate concerns. Local state is updated from confirmed evidence rather than optimistic UI state.

## Metadata

Public metadata follows the TON NFT metadata model (TEP-64). Metadata availability and required fields are validated before mutation where appropriate.

## Reconciliation

Collection and item state can be synchronized independently of the original mutation process. This makes partial failures recoverable and prevents a local database failure from turning into an accidental duplicate blockchain mutation.
