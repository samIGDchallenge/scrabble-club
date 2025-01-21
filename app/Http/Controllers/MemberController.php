<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveMemberRequest;
use App\Repository\MemberRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MemberController
{
    public function __construct(
        private MemberRepository $repository,
        private Factory $factory
    ) {}

    public function getMembers(): View
    {
        return view('members.list', [
            'page' => [
                'name' => 'Members'
            ],
            'members' => $this->repository->getAll()
        ]);
    }

    public function create(): View
    {
        return $this->factory->make('members.create');
    }

    public function save(SaveMemberRequest $request): View
    {
        $member = $this->repository->create(
            $request->getName(),
            $request->getEmail(),
            $request->getPhone(),
            $request->getJoinDate()
        );

        $member->save();

        return $this->view($member->getId());
    }

    public function view(string $memberId): View
    {
        $member = $this->repository->getMember($memberId);
        return $this->factory->make('members.view', [
            'page' => [
                'name' => sprintf('Member - %s', $member->getName())
            ],
            'member' => $member
        ]);
    }

    public function edit(string $memberId): View
    {
        $member = $this->repository->getMember($memberId);
        return $this->factory->make('members.edit', [
            'page' => [
                'name' => sprintf('Member - %s', $member->getName())
            ],
            'member' => $member
        ]);
    }

    public function update(SaveMemberRequest $request, string $memberId): RedirectResponse
    {
        $member = $this->repository->getMember($memberId);

        $member->setName($request->get(SaveMemberRequest::NAME))
            ->setEmail($request->get(SaveMemberRequest::EMAIL))
            ->setPhone($request->get(SaveMemberRequest::PHONE))
            ->setJoinDate($request->get(SaveMemberRequest::JOIN_DATE));

        $member->save();

        return new RedirectResponse(route('members'));
    }
}
