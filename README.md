PHP interfaces implementing [RFC 9420](https://www.rfc-editor.org/rfc/rfc9420.html) (Messaging Layer Security). This repository provides interface-only definitions for the main MLS abstractions (groups, ratchet tree, messages, proposals, commits, credentials, and crypto primitives) as a starting point for implementations.

Reference: https://www.rfc-editor.org/rfc/rfc9420.html

Status

- Interface-first: comprehensive RFC-shaped interfaces and registry enums implemented; no concrete cryptographic primitives included.
- Goal: provide a complete set of PHP interfaces that mirror RFC 9420 concepts for downstream implementations and tests.
Current status

- Interfaces: comprehensive interface-only definitions for the major RFC 9420 concepts (groups, ratchet tree, messages, proposals, commits, credentials, crypto abstractions).
- Registry enums: added enum-style classes mirroring RFC tables and registries (Tables 4–7 and related): `CipherSuite`, `KEM`, `KDF`, `AEAD`, `HashAlgorithm`, `SignatureScheme`, `ExtensionType`, `ProposalType`, `CredentialType`, `EpochSecrets`, `SignatureLabels`, `PublicKeyEncryptionLabels`, `MessageWireFormat`, and `ContentType`.
- Tests: a basic PHPUnit test (`tests/MLSInterfacesTest.php`) asserts presence of interfaces and method signatures; run locally with `./vendor/bin/phpunit`.
- Implementations: no concrete cryptographic implementations included — those remain out of scope.
 - Recent API changes: `MLSPlaintextInterface::getSender()` and `FramedContentInterface::getSender()` return a `SenderInterface` (typed sender union). `KeyScheduleInterface::init()` now accepts an ordered array of PSKs (`array $psks`) to reflect RFC PSK chaining semantics. `CommitInterface::getSender()` and `ProposalInterface::getSender()` now also return `SenderInterface`.

**DTOs & Adapters (examples/tests)**

- `src/MLS/Group/BasicGroup.php` — simple in-memory `Group` adapter that creates proposals, builds commits, and applies them to maintain an internal members list; paired with `BasicGroupContext` and `BasicGroupInfo` DTOs.
- `src/MLS/Crypto/BasicKeySchedule.php` — illustrative key-schedule adapter that accepts PSKs and derives epoch secrets used by tests (not cryptographically secure).
- `src/MLS/Crypto/BasicHPKE.php` — minimal envelope helper providing `seal()` and `open()` helpers used by tests to simulate HPKE behavior.
- `src/MLS/Credentials/BasicCredential.php` — credential DTO storing `type`, `identity`, and `publicKey`, implements `__toString()` and a simple `verifySignature()` stub for tests.
- `src/MLS/Handshake/BasicKeyPackage.php` — lightweight `KeyPackage` DTO containing an init key material, cipher suite, and credential reference for examples.
- `src/MLS/Handshake/KeyPackageBundle.php` — convenience wrapper around `KeyPackage` objects with simple serialization/verification helpers used in tests.
- `src/MLS/Proposal/BasicProposal.php` — proposal DTO capturing a `type`, `sender`, and payload; used with `ProposalList.php` which provides collection and basic validation helpers.
- `src/MLS/Commit/BasicCommit.php` — commit DTO that packages proposals (and optionally an update path) produced by `BasicGroup::commit()`.
- `src/MLS/Tree/LeafNode.php`, `src/MLS/Commit/UpdatePath.php`, `src/MLS/Commit/UpdatePathNode.php` — small DTOs representing leaf nodes and update-path structures used by commit/update tests.

These adapters are intentionally minimal and intended for tests and examples only — they are not production-grade cryptographic implementations.
Implemented (interface files) — ordered by RFC section

 - [`src/MLS/MLSInterface.php`](src/MLS/MLSInterface.php) — RFC 9420: Protocol Overview ([Section 3](https://www.rfc-editor.org/rfc/rfc9420.html#section-3))
 - [`src/MLS/Tree/TreeInterface.php`](src/MLS/Tree/TreeInterface.php) — RFC 9420: Ratchet Tree Concepts ([Section 4](https://www.rfc-editor.org/rfc/rfc9420.html#section-4))
 - [`src/MLS/Tree/LeafNodeInterface.php`](src/MLS/Tree/LeafNodeInterface.php) — RFC 9420: Ratchet Tree Terminology ([Section 4.1](https://www.rfc-editor.org/rfc/rfc9420.html#section-4.1))
 - [`src/MLS/Tree/ParentNodeInterface.php`](src/MLS/Tree/ParentNodeInterface.php) — RFC 9420: Ratchet Tree Terminology ([Section 4.1](https://www.rfc-editor.org/rfc/rfc9420.html#section-4.1))
 - [`src/MLS/Crypto/CipherSuiteInterface.php`](src/MLS/Crypto/CipherSuiteInterface.php) — RFC 9420: Cipher Suites ([Section 5.1](https://www.rfc-editor.org/rfc/rfc9420.html#section-5.1))
 - [`src/MLS/Signature/SignatureSchemeInterface.php`](src/MLS/Signature/SignatureSchemeInterface.php) — RFC 9420: Signing ([Section 5.1.2](https://www.rfc-editor.org/rfc/rfc9420.html#section-5.1.2))
 - [`src/MLS/Crypto/HPKEInterface.php`](src/MLS/Crypto/HPKEInterface.php) — RFC 9420: Public Key Encryption ([Section 5.1.3](https://www.rfc-editor.org/rfc/rfc9420.html#section-5.1.3))
 - [`src/MLS/Credentials/CredentialInterface.php`](src/MLS/Credentials/CredentialInterface.php) — RFC 9420: Credentials ([Section 5.3](https://www.rfc-editor.org/rfc/rfc9420.html#section-5.3))
 - [`src/MLS/Message/MLSMessageInterface.php`](src/MLS/Message/MLSMessageInterface.php) — RFC 9420: Message Framing ([Section 6](https://www.rfc-editor.org/rfc/rfc9420.html#section-6))
 - [`src/MLS/Message/MLSPlaintextInterface.php`](src/MLS/Message/MLSPlaintextInterface.php) — RFC 9420: PublicMessage / PrivateMessage ([Section 6](https://www.rfc-editor.org/rfc/rfc9420.html#section-6))
 - [`src/MLS/Message/MLSCiphertextInterface.php`](src/MLS/Message/MLSCiphertextInterface.php) — RFC 9420: PublicMessage / PrivateMessage ([Section 6](https://www.rfc-editor.org/rfc/rfc9420.html#section-6))
 - [`src/MLS/Crypto/KeyScheduleInterface.php`](src/MLS/Crypto/KeyScheduleInterface.php) — RFC 9420: Key Schedule / Secret Tree ([Section 7](https://www.rfc-editor.org/rfc/rfc9420.html#section-7))
 - [`src/MLS/Export/ExporterInterface.php`](src/MLS/Export/ExporterInterface.php) — RFC 9420: Exporter ([Section 7](https://www.rfc-editor.org/rfc/rfc9420.html#section-7))
 - [`src/MLS/Handshake/KeyPackageInterface.php`](src/MLS/Handshake/KeyPackageInterface.php) — RFC 9420: KeyPackage ([Section 8](https://www.rfc-editor.org/rfc/rfc9420.html#section-8))
 - [`src/MLS/Handshake/KeyPackageInterface.php`](src/MLS/Handshake/KeyPackageInterface.php) — RFC 9420: KeyPackage ([Section 8](https://www.rfc-editor.org/rfc/rfc9420.html#section-8))
 - [`src/MLS/Handshake/KeyPackageBundleInterface.php`](src/MLS/Handshake/KeyPackageBundleInterface.php) — KeyPackageBundle ([Section 8.1](https://www.rfc-editor.org/rfc/rfc9420.html#section-8.1))
 - [`src/MLS/Transcript/TranscriptInterface.php`](src/MLS/Transcript/TranscriptInterface.php) — RFC 9420: Transcript Hashes ([Section 10](https://www.rfc-editor.org/rfc/rfc9420.html#section-10))
 - [`src/MLS/Welcome/WelcomeInterface.php`](src/MLS/Welcome/WelcomeInterface.php) — RFC 9420: Welcome ([Section 11](https://www.rfc-editor.org/rfc/rfc9420.html#section-11))
 - [`src/MLS/Welcome/EncryptedGroupSecretsInterface.php`](src/MLS/Welcome/EncryptedGroupSecretsInterface.php) — RFC 9420: Welcome ([Section 11](https://www.rfc-editor.org/rfc/rfc9420.html#section-11))
 - [`src/MLS/Group/GroupInterface.php`](src/MLS/Group/GroupInterface.php) — RFC 9420: Group Evolution ([Section 12](https://www.rfc-editor.org/rfc/rfc9420.html#section-12))
 - [`src/MLS/Group/GroupContextInterface.php`](src/MLS/Group/GroupContextInterface.php) — RFC 9420: Group Context / GroupInfo ([Section 12](https://www.rfc-editor.org/rfc/rfc9420.html#section-12))
 - [`src/MLS/Group/GroupInfoInterface.php`](src/MLS/Group/GroupInfoInterface.php) — RFC 9420: Group Context / GroupInfo ([Section 12](https://www.rfc-editor.org/rfc/rfc9420.html#section-12))
 - [`src/MLS/Group/GroupMembershipInterface.php`](src/MLS/Group/GroupMembershipInterface.php) — Group membership helpers ([Section 12.4.3](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.4.3))
 - [`src/MLS/Proposal/ProposalInterface.php`](src/MLS/Proposal/ProposalInterface.php) — RFC 9420: Proposals ([Section 12.1](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.1))
 - [`src/MLS/Proposal/AddProposalInterface.php`](src/MLS/Proposal/AddProposalInterface.php) — RFC 9420: Add ([Section 12.1.1](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.1.1))
 - [`src/MLS/Proposal/UpdateProposalInterface.php`](src/MLS/Proposal/UpdateProposalInterface.php) — RFC 9420: Update ([Section 12.1.2](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.1.2))
 - [`src/MLS/Proposal/RemoveProposalInterface.php`](src/MLS/Proposal/RemoveProposalInterface.php) — RFC 9420: Remove ([Section 12.1.3](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.1.3))
 - [`src/MLS/Proposal/PreSharedKeyProposalInterface.php`](src/MLS/Proposal/PreSharedKeyProposalInterface.php) — RFC 9420: PreSharedKey ([Section 12.1.4](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.1.4))
 - [`src/MLS/Proposal/ReInitProposalInterface.php`](src/MLS/Proposal/ReInitProposalInterface.php) — RFC 9420: ReInit ([Section 12.1.5](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.1.5))
 - [`src/MLS/Proposal/ExternalInitProposalInterface.php`](src/MLS/Proposal/ExternalInitProposalInterface.php) — RFC 9420: ExternalInit ([Section 12.1.6](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.1.6))
 - [`src/MLS/Proposal/GroupContextExtensionsProposalInterface.php`](src/MLS/Proposal/GroupContextExtensionsProposalInterface.php) — RFC 9420: GroupContextExtensions ([Section 12.1.7](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.1.7))
 - [`src/MLS/Proposal/ExternalProposalInterface.php`](src/MLS/Proposal/ExternalProposalInterface.php) — RFC 9420: External Proposal ([Section 12.1.8](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.1.8))
 - [`src/MLS/Proposal/ProposalListInterface.php`](src/MLS/Proposal/ProposalListInterface.php) — RFC 9420: Proposal List ([Section 12.2](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.2))
 - [`src/MLS/Proposal/ProposalListValidatorInterface.php`](src/MLS/Proposal/ProposalListValidatorInterface.php) — RFC 9420: Proposal List Validation ([Section 12.2](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.2))
 - [`src/MLS/Proposal/ProposalApplierInterface.php`](src/MLS/Proposal/ProposalApplierInterface.php) — RFC 9420: Applying Proposal Lists ([Section 12.3](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.3))
 - [`src/MLS/Commit/CommitInterface.php`](src/MLS/Commit/CommitInterface.php) — RFC 9420: Commit ([Section 12.4](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.4))
 - [`src/MLS/Commit/CommitCreatorInterface.php`](src/MLS/Commit/CommitCreatorInterface.php) — RFC 9420: Creating a Commit ([Section 12.4.1](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.4.1))
 - [`src/MLS/Commit/CommitProcessorInterface.php`](src/MLS/Commit/CommitProcessorInterface.php) — RFC 9420: Processing a Commit ([Section 12.4.2](https://www.rfc-editor.org/rfc/rfc9420.html#section-12.4.2))
 - [`src/MLS/Extensions/ExtensionInterface.php`](src/MLS/Extensions/ExtensionInterface.php) — RFC 9420: Extensions ([Section 13](https://www.rfc-editor.org/rfc/rfc9420.html#section-13))

Enums / identifiers

 - [`src/MLS/Enums/EpochSecrets.php`](src/MLS/Enums/EpochSecrets.php) — RFC 9420: Epoch-Derived Secrets ([Table 4](https://www.rfc-editor.org/rfc/rfc9420.html#table-4))
 - [`src/MLS/Enums/CipherSuite.php`](src/MLS/Enums/CipherSuite.php) — RFC 9420: Cipher Suites ([Table 6](https://www.rfc-editor.org/rfc/rfc9420.html#table-6) & [Table 7](https://www.rfc-editor.org/rfc/rfc9420.html#table-7))
 - [`src/MLS/Enums/KEM.php`](src/MLS/Enums/KEM.php) — HPKE KEM identifiers ([Table 7](https://www.rfc-editor.org/rfc/rfc9420.html#table-7))
 - [`src/MLS/Enums/KDF.php`](src/MLS/Enums/KDF.php) — KDF identifiers ([Table 7](https://www.rfc-editor.org/rfc/rfc9420.html#table-7))
 - [`src/MLS/Enums/AEAD.php`](src/MLS/Enums/AEAD.php) — AEAD identifiers ([Table 7](https://www.rfc-editor.org/rfc/rfc9420.html#table-7))
 - [`src/MLS/Enums/HashAlgorithm.php`](src/MLS/Enums/HashAlgorithm.php) — Hash algorithm identifiers ([Table 7](https://www.rfc-editor.org/rfc/rfc9420.html#table-7))
 - [`src/MLS/Enums/SignatureScheme.php`](src/MLS/Enums/SignatureScheme.php) — Signature scheme identifiers ([Table 7](https://www.rfc-editor.org/rfc/rfc9420.html#table-7))
 - [`src/MLS/Enums/MessageWireFormat.php`](src/MLS/Enums/MessageWireFormat.php) — RFC 9420: MLS Wire Formats ([Table 8](https://www.rfc-editor.org/rfc/rfc9420.html#table-9))
 - [`src/MLS/Enums/ExtensionType.php`](src/MLS/Enums/ExtensionType.php) — RFC 9420: MLS Extension Types ([Table 9](https://www.rfc-editor.org/rfc/rfc9420.html#table-9))
 - [`src/MLS/Enums/ProposalType.php`](src/MLS/Enums/ProposalType.php) — RFC 9420: MLS Proposal Types ([Table 10](https://www.rfc-editor.org/rfc/rfc9420.html#table-9))
 - [`src/MLS/Enums/CredentialType.php`](src/MLS/Enums/CredentialType.php) — RFC 9420: MLS Credential Types ([Table 11](https://www.rfc-editor.org/rfc/rfc9420.html#table-11))
 - [`src/MLS/Enums/SignatureLabels.php`](src/MLS/Enums/SignatureLabels.php) — RFC 9420: MLS Signature Labels ([Table 12](https://www.rfc-editor.org/rfc/rfc9420.html#table-12))
 - [`src/MLS/Enums/PublicKeyEncryptionLabels.php`](src/MLS/Enums/PublicKeyEncryptionLabels.php) — RFC 9420: MLS Public Key Encryption Labels ([Table 13](https://www.rfc-editor.org/rfc/rfc9420.html#table-13))

All RFC sections listed in the original TODO have corresponding interface files and identifiers in this repository. See the `Implemented` list above for file-level cross-references to RFC sections.


Quick start

Install dependencies:

```bash
composer install
```

Run formatting (Pint):

```bash
composer run-script pint
```

Run tests:

```bash
composer run-script unit
# or directly:
./vendor/bin/phpunit tests/
```

On Windows use the shipped `.bat` wrappers in `vendor/bin` (for example `vendor/bin/phpunit.bat`).

Notes

- The project is interface-first; concrete implementations are intentionally out of scope for now.
- Tests assert presence of core interfaces and method signatures (see `tests/MLSInterfacesTest.php`).
 - Registry enums were added to reflect RFC 9420 numeric/label registries; see `src/MLS/Enums/` for details.
 - Running the test suite may surface configuration or deprecation warnings depending on your environment (PHPUnit version, PHP version). Addressing deprecations and expanding test coverage are planned.

RFC coverage

- Core group lifecycle (Group, Commit, Proposal): partial — interfaces exist for proposals and commits.
- Ratchet tree (Tree, LeafNode, ParentNode): covered by tree interfaces; concrete hashing/ratchet logic not implemented.
- Handshake: `KeyPackage` and `Welcome` interfaces added; key package bundles and encrypted secrets not implemented.
- Crypto: Cipher suite, KeySchedule, HPKE, and signature scheme abstractions provided; implementations required.
- Extensions & Transcript: extension and transcript interfaces included for payloads and hash tracking.
 - RFC registries mirrored: wire formats, proposal types, extension types, credential types, signature labels, and public-key encryption labels are represented under `src/MLS/Enums/`.

Registry details

- **Epoch-derived secrets (Table 4)**: common labels used by the key schedule are mirrored in `src/MLS/Enums/EpochSecrets.php`. Labels include `"sender data"`, `"encryption"`, `"exporter"`, `"external"`, `"confirm"`, `"membership"`, `"resumption"`, and `"authentication"`. Each label maps to a derived secret name (for example, `"confirm"` → `confirmation_key`) and a short-purpose description.

- **Cipher suites (Tables 6 & 7)**: the CipherSuite registry is represented in `src/MLS/Enums/CipherSuite.php`. It includes the initial MLS 1.0 suites (e.g. `MLS_128_DHKEMX25519_AES128GCM_SHA256_Ed25519`) and GREASE/private-use ranges. The mandatory-to-implement suite for MLS 1.0 is `MLS_128_DHKEMX25519_AES128GCM_SHA256_Ed25519`. Each suite exposes component mappings (KEM/KDF/AEAD/Hash/Signature) via helper accessors in the enum class.

Roadmap

1. Address PHPUnit deprecation(s) and stabilize CI runs.
2. Expand tests to validate enum mappings, serialization formats, and contract behavior.
3. Add minimal reference implementations or adapters for HPKE/signature primitives.
4. Implement end-to-end examples that exercise the KeySchedule, Commit, and Welcome flows.

If you'd like, I can add a short example showing how to construct a `SenderInterface` instance value (as a simple DTO) for use with these interfaces — or scaffold minimal reference implementations for `KeySchedule` and `HPKE` to exercise PSK chaining and welcome creation.

Contributing

- Add concrete implementations under `src/MLS/` and tests under `tests/`.
- Follow code style in `pint.json` and run `composer run-script pint` before submitting PRs.

License

See LICENSE.md in the repository root.
