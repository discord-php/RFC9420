PHP interfaces implementing [RFC 9420](https://www.rfc-editor.org/rfc/rfc9420.html) (Messaging Layer Security). This repository provides interface-only definitions for the main MLS abstractions (groups, ratchet tree, messages, proposals, commits, credentials, and crypto primitives) as a starting point for implementations.

Reference: https://www.rfc-editor.org/rfc/rfc9420.html

Status

- Interfaces only — no concrete implementations yet.
- Goal: provide a complete set of PHP interfaces that mirror RFC 9420 concepts for downstream implementations and tests.

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

RFC coverage

- Core group lifecycle (Group, Commit, Proposal): partial — interfaces exist for proposals and commits.
- Ratchet tree (Tree, LeafNode, ParentNode): covered by tree interfaces; concrete hashing/ratchet logic not implemented.
- Handshake: `KeyPackage` and `Welcome` interfaces added; key package bundles and encrypted secrets not implemented.
- Crypto: Cipher suite, KeySchedule, HPKE, and signature scheme abstractions provided; implementations required.
- Extensions & Transcript: extension and transcript interfaces included for payloads and hash tracking.
 - RFC registries mirrored: wire formats, proposal types, extension types, credential types, signature labels, and public-key encryption labels are represented under `src/MLS/Enums/`.

Roadmap

1. Add KeyPackageBundle and EncryptedGroupSecrets interfaces.
2. Provide minimal concrete stubs (HPKE, Signature) to run end-to-end tests.
3. Expand tests to validate RFC section mapping and serialization formats.
4. Implement reference implementations or adapters to libs (sodium, openmls bindings, etc.).

Contributing

- Add concrete implementations under `src/MLS/` and tests under `tests/`.
- Follow code style in `pint.json` and run `composer run-script pint` before submitting PRs.

License

See LICENSE.md in the repository root.
