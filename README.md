php-mls-rfc9420-interfaces

PHP interfaces implementing RFC 9420 (Messaging Layer Security). This repository provides interface-only definitions for the main MLS abstractions (groups, ratchet tree, messages, proposals, commits, credentials, and crypto primitives) as a starting point for implementations.

Reference: https://www.rfc-editor.org/rfc/rfc9420.html

Status

- Interfaces only — no concrete implementations yet.
- Goal: provide a complete set of PHP interfaces that mirror RFC 9420 concepts for downstream implementations and tests.

Implemented (interface files)

- src/MLS/MLSInterface.php
- src/MLS/Group/GroupInterface.php
- src/MLS/Group/GroupContextInterface.php
- src/MLS/Group/GroupInfoInterface.php
- src/MLS/Tree/TreeInterface.php
- src/MLS/Tree/LeafNodeInterface.php
- src/MLS/Tree/ParentNodeInterface.php
- src/MLS/Credentials/CredentialInterface.php
- src/MLS/Crypto/CipherSuiteInterface.php
- src/MLS/Crypto/KeyScheduleInterface.php
- src/MLS/Crypto/HPKEInterface.php
- src/MLS/Signature/SignatureSchemeInterface.php
- src/MLS/Export/ExporterInterface.php
- src/MLS/Message/MLSMessageInterface.php
- src/MLS/Message/MLSPlaintextInterface.php
- src/MLS/Message/MLSCiphertextInterface.php
- src/MLS/Handshake/KeyPackageInterface.php
- src/MLS/Welcome/WelcomeInterface.php
- src/MLS/Proposal/ProposalInterface.php
- src/MLS/Proposal/AddProposalInterface.php
- src/MLS/Proposal/UpdateProposalInterface.php
- src/MLS/Proposal/RemoveProposalInterface.php
- src/MLS/Proposal/PreSharedKeyProposalInterface.php
- src/MLS/Extensions/ExtensionInterface.php
- src/MLS/Transcript/TranscriptInterface.php
- src/MLS/Commit/CommitInterface.php

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
