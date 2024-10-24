<?php

require_once "bootstrap.php";
use SrcEntitySpecialist;
use SrcRepositoryProductSpecialist;
use SymfonyBundleFrameworkBundleControllerAbstractController;
use SymfonyComponentHttpFoundationRequest;
use SymfonyComponentHttpFoundationResponse;
use SymfonyComponentRoutingAnnotationRoute;

class SpecialistController extends AbstractController
{
    private $specialistRepository;

    public function __construct(SpecialistRepository $specialistRepository)
    {
        $this->specialistRepository = $specialistRepository;
    }

    public function index(): Response
    {
        $specialists = $this->specialistRepository->findAll();
# как я понимаю render это метод наследуемый из absractcomtroller,
        return $this->render('specialist/index.html.twig', [
            'specialists' => $specialists,
        ]);
    }

    public function new(Request $request): Response
    {
        $specialist = new Specialist();
        $form = $this->createForm(SpecialistType::class, $specialist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->specialistRepository->save($specialist);

            return $this->redirectToRoute('specialist_index');
        }
#передаю данные в view шаблон
        return $this->render('specialist/new.html.twig', [
            'specialist' => $specialist,
            'form' => $form->createView(),
        ]);
    }

    public function show(int $id): Response
    {
        $specialist = $this->specialistRepository->findById($id);

        if (!$specialist) {
            throw $this->createNotFoundException('Specialist not found.');
        }

        return $this->render('specialist/show.html.twig', [
            'specialist' => $specialist,
        ]);
    }

    public function edit(Request $request, int $id): Response
    {
        $specialist = $this->specialistRepository->findById($id);

        if (!$specialist) {
            throw $this->createNotFoundException('Specialist not found.');
        }

        $form = $this->createForm(SpecialistType::class, $specialist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->specialistRepository->update($specialist);

            return $this->redirectToRoute('specialist_index');
        }

        return $this->render('specialist/edit.html.twig', [
            'specialist' => $specialist,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, int $id): Response
    {
        $specialist = $this->specialistRepository->findById($id);

        if (!$specialist) {
            throw $this->createNotFoundException('Specialist not found.');
        }

        if ($this->isCsrfTokenValid('delete' . $specialist->getId(), $request->request->get('_token'))) {
            $this->specialistRepository->delete($specialist);
        }

        return $this->redirectToRoute('specialist_index');
    }
}
